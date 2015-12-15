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

    // run commmand
    $mysqldump= exec('which mysqldump');

    $command = "$mysqldump --opt -h $dbhost -u $dbuser -p$dbpass $dbname > $dbname.sql";

    exec($command);

    // returns dbname for force download file exported
    return $dbname . '.sql';
  }

}