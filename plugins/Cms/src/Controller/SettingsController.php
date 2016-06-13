<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

class SettingsController extends AppController
{

  public function index()
  {
    // home

    if($this->request->is(["post", "pust"])) {
      // get datasource config
      $connection = ConnectionManager::get('default');
      $config = $connection->config();

      // aliases
      $host = $config['host'];
      $user = $config['username'];
      $pass = $config['password'];
      $name = 'abacate';

      $script_path = $this->request->data['dump']['tmp_name'];


      // Connect to MySQL server
      mysql_connect($host, $user, $pass) or die('Error connecting to MySQL server: ' . mysql_error());
      // Select database
      mysql_select_db($name) or die('Error selecting MySQL database: ' . mysql_error());

      mysql_query("SET NAMES 'utf8'");
      mysql_query('SET character_set_connection=utf8');
      mysql_query('SET character_set_client=utf8');
      mysql_query('SET character_set_results=utf8');
      
      // Temporary variable, used to store current query
      $templine = '';
      // Read in entire file
      $lines = file($script_path);
      // Loop through each line
      foreach ($lines as $line)
      {
      // Skip it if it's a comment
      if (substr($line, 0, 2) == '--' || $line == '')
          continue;

      // Add this line to the current segment
      $templine .= $line;
      // If it has a semicolon at the end, it's the end of the query
      if (substr(trim($line), -1, 1) == ';')
      {
          // Perform the query
          mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
          // Reset temp variable to empty
          $templine = '';
      }
      }
      $this->Flash->success(__('Importação efetuada com sucesso.'));

      return $this->redirect(['action' => 'index']);

    }
  }

  public function backup()
  {
    // download db
    $filename = self::download_db();
    
    // forces download backup
    $this->response->file($filename, ['download' => true]);

    return $this->response;
  }

  public function delete_all()
  {
    // get datasource config
    $connection = ConnectionManager::get('default');

    // download db
    $filename = self::download_db();

    // get all tables
    $tables = $connection->schemaCollection()->listTables();

    // deleteAll() tables
    foreach($tables as $key => $table) {

      // whitelist
      $ignore = ['admins', 'permissions'];

      if(!in_array($table, $ignore))
      {
        $tableData = TableRegistry::get($table);

        $tableData->deleteAll('1=1');
      }
    }

    // forces download backup
    $this->response->file($filename, ['download' => true]);

    return $this->response;
  }

  /* backup the db OR just a table */
  public function backup_tables($host,$user,$pass,$name,$tables = '*')
  {
    $return = '';
    $link = mysql_connect($host,$user,$pass);
    mysql_select_db($name,$link);

    mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');
    
    //get all of the tables
    if($tables == '*')
    {
      $tables = array();
      $result = mysql_query('SHOW TABLES');
      while($row = mysql_fetch_row($result))
      {
        $tables[] = $row[0];
      }
    }
    else
    {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
    
    //cycle through
    foreach($tables as $table)
    {
      $result = mysql_query('SELECT * FROM '.$table);
      $num_fields = mysql_num_fields($result);
      
      //$return.= 'DROP TABLE '.$table.';';
      $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
      for ($i = 0; $i < $num_fields; $i++) 
      {
        while($row = mysql_fetch_row($result))
        {
          $return.= 'INSERT INTO '.$table.' VALUES(';
          for($j=0; $j < $num_fields; $j++) 
          {
            $row[$j] = addslashes($row[$j]);
            $row[$j] = ereg_replace("\n","\\n",$row[$j]);
            if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
            if ($j < ($num_fields-1)) { $return.= ','; }
          }
          $return.= ");\n";
        }
      }
      $return.="\n\n\n";
    }
    
    //save file
    $filename = 'db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql';
    $handle = fopen($filename,'w+');
    fwrite($handle,$return);
    fclose($handle);

    return $filename;
  }

  private function download_db()
  {
    // get datasource config
    $connection = ConnectionManager::get('default');
    $config = $connection->config();

    // aliases
    $dbhost = $config['host'];
    $dbuser = $config['username'];
    $dbpass = $config['password'];
    $dbname = $config['database'];

    return $this->backup_tables($dbhost,$dbuser,$dbpass,$dbname);
  }

}