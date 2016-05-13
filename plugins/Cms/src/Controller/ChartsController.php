<?php
namespace Cms\Controller;

use Cms\Controller\AppController;
use Cake\ORM\TableRegistry;

class ChartsController extends AppController
{

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

                // Alerta e redirecionamento
                $this->Flash->success(__('O gráfico foi cadastrado cmo sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível salvar o gráfico.'));
            }
        }

        $types = [
           "line" =>"Linha"
          ,"spline" =>"Linha 2"
          ,"area" =>"Área"
          ,"areaspline" =>"Área 2"
          ,"column" =>"Coluna"
          ,"bar" =>"Barra"
          ,"pie" =>"Pizza"
        ];

        $user_id = $this->currentUser('user_id');

        // Envia dados para a view
        $this->set(compact('chart', 'themes', "types", "user_id"));
    }

    /**
     * Página de edição de um gráfico.
     */
    public function edit($id = null)
    {
        // Busca dados do estudante atual
        $estudanteAtual = $this->estudanteAtual();

        // Adiciona novo gráfico pertencendo ao estudante atual
        $chart = $this->Charts->find()->contain(['ChartSeries'])->where(['id' =>$id])->first();

        // Se houver requisição POST
        if ($this->request->is(['post', 'put'])) {

            // Atualiza entidade com dados do formulário
            $chart = $this->Charts->patchEntity($chart, $this->request->data);

            // Se for possível salvar o gráfico
            if ($this->Charts->save($chart)) {

                // Alerta e redirecionamento
                $this->Flash->success(__('O gráfico foi cadastrado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível salvar o gráfico.'));
            }
        }

        $types = [
           "line" =>"Linha"
          ,"spline" =>"Linha 2"
          ,"area" =>"Área"
          ,"areaspline" =>"Área 2"
          ,"column" =>"Coluna"
          ,"bar" =>"Barra"
          ,"pie" =>"Pizza"
        ];

        $user_id = $this->currentUser('user_id');

        // Envia dados para a view
        $this->set(compact('chart', 'themes', "types", "user_id"));
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
        //$this->request->allowMethod(['post', 'delete']);
        $chart = $this->Charts->get($id);
        if ($this->Charts->delete($chart)) {
            $this->Flash->success(__('O gráfico foi excluído.'));
        } else {
            $this->Flash->error(__('The chart could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
