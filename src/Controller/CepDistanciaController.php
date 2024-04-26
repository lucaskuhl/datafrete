<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\Helpers\CepHandler;


/**
 * CepDistancia Controller
 *
 * @property \App\Model\Table\CepDistanciaTable $CepDistancia
 */
class CepDistanciaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CepDistancia->find();
        $cepDistancia = $this->paginate($query);

        $this->set(compact('cepDistancia'));
    }

    /**
     * View method
     *
     * @param string|null $id Cep Distancium id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cepDistancia = $this->CepDistancia->get($id, contain: []);
        $this->set(compact('cepDistancia'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coords = array();
        $cepDistancia = $this->CepDistancia->newEmptyEntity();
        if ($this->request->is('post')) {
            $cepDistancia = $this->CepDistancia->patchEntity($cepDistancia, $this->request->getData());


            try {
                $coords = CepHandler::GetCoords($cepDistancia->get('cep_origem'), $cepDistancia->get('cep_destino'));

                $cepDistancia->set('distancia_calculada', $this->calculateDistance($coords));
                $cepDistancia->set('data_criacao', date("Y-m-d H:i:s"));

                if ($this->CepDistancia->save($cepDistancia)) {
                    $this->Flash->success(__('CEP salvo com sucesso!'));

                    return $this->redirect(['action' => 'index']);
                }
            } catch (\Throwable $th) {

                $this->Flash->error(__($th->getMessage()));
            }

            $this->Flash->error(__('Erro ao salvar, por favor tente novamente.'));
        }
        $this->set(compact('cepDistancia'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cep Distancium id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cepDistancia = $this->CepDistancia->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cepDistancia = $this->CepDistancia->patchEntity($cepDistancia, $this->request->getData());

            try {
                $coords = CepHandler::GetCoords($cepDistancia->get('cep_origem'), $cepDistancia->get('cep_destino'));

                $cepDistancia->set('distancia_calculada', $this->calculateDistance($coords));
                $cepDistancia->set('data_atualizacao', date("Y-m-d H:i:s"));

                if ($this->CepDistancia->save($cepDistancia)) {
                    $this->Flash->success(__('CEP atualizado com sucesso!'));

                    return $this->redirect(['action' => 'index']);
                }
            } catch (\Throwable $th) {
                $this->Flash->error(__($th->getMessage()));
            }

            $this->Flash->error(__('Erro ao salvar, por favor tente novamente.'));
        }
        $this->set(compact('cepDistancia'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cep Distancium id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cepDistancia = $this->CepDistancia->get($id);
        if ($this->CepDistancia->delete($cepDistancia)) {
            $this->Flash->success(__('CEP excluído com sucesso!'));
        } else {
            $this->Flash->error(__('Erro ao deletar, por favor tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Calculate distance between two points using Haversine formula
     * 
     * @param array $coords containing arrays for 'cepOrigem' and 'cepDestino' with their respective 'latitude' and 'longitude'
     */
    private function calculateDistance($coords)
    {
        $latFrom = deg2rad(floatval($coords['cepOrigem']['latitude']));
        $lonFrom = deg2rad(floatval($coords['cepOrigem']['longitude']));
        $latTo = deg2rad(floatval($coords['cepDestino']['latitude']));
        $lonTo = deg2rad(floatval($coords['cepDestino']['longitude']));

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        return floatval(number_format($angle * 6371, 2, '.', ''));
    }
}
