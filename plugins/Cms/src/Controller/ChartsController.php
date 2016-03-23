<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Charts Controller
 *
 * @property \Cms\Model\Table\ChartsTable $Charts
 */
class ChartsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $estudanteAtual = $this->estudanteAtual();

        $charts = $this->Charts->find()->contain(['Users'])->where(
        [
            'Charts.user_id' => $estudanteAtual['id']
        ])->all()->toArray();

        $this->set('charts', $charts);
    }

    /**
     * Página de inserção de novos gráficos.
     */
    public function add()
    {
        // Busca dados do estudante atual
        $estudanteAtual = $this->estudanteAtual();

        // Adiciona novo gráfico pertencendo ao estudante atual
        $chart = $this->Charts->newEntity([
            'user_id' => $estudanteAtual['id']
        ]);

        // Se houver requisição POST
        if ($this->request->is('post')) {
            // Atualiza entidade com dados do formulário
            $chart = $this->Charts->patchEntity($chart, $this->request->data);

            // Se for possível salvar o gráfico
            if ($this->Charts->save($chart)) {

                // Se houver matérias no gráfico, salvá-las também
                if(!empty($this->request->data['themes']))
                {
                    foreach($this->request->data['themes'] as $td)
                    {
                        $tmp = $chart_themes_table->newEntity(['chart_id' => $chart->id, 'theme_id' => $td]);

                        $chart_themes_table->save($tmp);
                    }
                }

                // Alerta e redirecionamento
                $this->Flash->success(__('O gráfico foi cadastrado cmo sucesso.'));
                return $this->redirect(['action' => 'edit', $chart->id]);
            } else {
                $this->Flash->error(__('Não foi possível salvar o gráfico.'));
            }
        }

        // Matérias pro select
        $themes = $this->Charts->Themes->find('list', ['limit' => 200]);

        // Envia dados para a view
        $this->set(compact('chart', 'themes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chart id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chart = $this->Charts->get($id, [
            'contain' => ['ChartInputs' => function($q) {
                return $q->contain(["Inputs"]);
            }],
            'associated' => ['ChartInputs']
        ]);

        $chart_themes_table = TableRegistry::get("ChartThemes");
        $chart_themes = $chart_themes_table->find('list', ['keyField' => 'id', 'valueField' => 'theme_id'])->where(['chart_id' => $id])->all();

        $chart->themes = array_values($chart_themes->toArray());

        if ($this->request->is(['patch', 'post', 'put'])) {

            $chart = $this->Charts->patchEntity($chart, $this->request->data);

            if ($this->Charts->save($chart)) {

                // salva as matérias
                $all = $chart_themes_table->find()->where(['chart_id' => $id])->all();

                foreach($all as $a)
                {
                    $chart_themes_table->delete($a);
                }

                if(!empty($this->request->data['themes']))
                {
                    foreach($this->request->data['themes'] as $td)
                    {
                        $tmp = $chart_themes_table->newEntity(['chart_id' => $id, 'theme_id' => $td]);

                        $chart_themes_table->save($tmp);
                    }
                }

                $chart_inputs = $this->Charts->ChartInputs->find()->where(['ChartInputs.chart_id' => $id])->all();

                foreach($this->request->data['chart_inputs'] as $ci)
                {
                    $found = false;

                    foreach($chart_inputs as $ci2)
                    {
                        if($ci2->input_id == $ci)
                        {
                            $found = true;
                        }
                    }

                    if(!$found)
                    {

                        if(!empty($ci))
                        {
                            $tmp = $this->Charts->ChartInputs->newEntity(['chart_id' => $id, 'input_id' => $ci]);

                            $this->Charts->ChartInputs->save($tmp);
                        }
                    }

                }

                $this->Flash->success(__('The chart has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The chart could not be saved. Please, try again.'));
            }
        }
        $users = $this->Charts->Users->find('list', ['limit' => 200]);
        $themes = $this->Charts->Themes->find('list', ['limit' => 200]);
        $inputs = $this->Charts->ChartInputs->Inputs->find('list', ['limit' => 200]);
        $this->set(compact('chart', 'users', 'themes', 'inputs'));
        $this->set('_serialize', ['chart']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chart id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chart = $this->Charts->get($id);
        if ($this->Charts->delete($chart)) {
            $this->Flash->success(__('The chart has been deleted.'));
        } else {
            $this->Flash->error(__('The chart could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
