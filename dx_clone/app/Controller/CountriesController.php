<?php
App::uses('AppController', 'Controller');

class CountriesController extends AppController
{
    public $components = array('Paginator');

    public function admin_index()
    {
		if($this->request->is('post'))
		{
			$cid = $this->request->data['Country']['cid'];
			$status = $this->request->data['Country']['status'];
			$this->changeStatus($cid,'Country','countries','status',$status);
			$this->Session->setFlash('Thiết lập thành công','default',array('class'=>'alert alert-success'));
			$this->redirect($this->referer());
			// pr($this->request->data);exit;
		}
        $this->Paginator->settings = array(
            'order' => array('created' => 'asc'),
            'limit' => 200
        );
        $this->set('countries', $this->Paginator->paginate('Country'));
    }

    public function admin_add()
    {
        if ($this->request->is('post')) {
            if ($this->Country->save($this->request->data)) {
                $this->Session->setFlash('Them quoc gia thanh cong!');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Them quoc gia khong thanh cong!');
            }
        }
    }

    public function admin_edit($id = null)
    {
        if (!$this->Country->exists($id)) {
            throw new NotFoundException(__('Invalid Country'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Country->save($this->request->data)) {
                $this->Session->setFlash(__('Thay doi quoc gia thanh cong'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Thay doi quoc gia khong thanh cong'));
            }
        } else {
            $options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
            $this->request->data = $this->Country->find('first', $options);
        }
    }

    public function admin_delete($id = null)
    {
        $this->Country->id = $id;
        if (!$this->Country->exists()) {
            throw new NotFoundException(__('Invalid Country'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Country->delete()) {
            $this->Session->setFlash(__('Xoa quoc gia thanh cong'));
        } else {
            $this->Session->setFlash(__('Xoa quoc gia khong thanh cong.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

	
	public function admin_unaccess($id = null){
		$this->loadModel('Country');
		if($this->request->is('post'))
		{
			$this->Country->id = $id;
			$this->Country->saveField('type', 0);
			$this->redirect($this->referer());
		}
	}
	public function admin_access($id = null){
		$this->loadModel('Country');
		if($this->request->is('post'))
		{
			$this->Country->id = $id;
			$this->Country->saveField('type', 1);
			$this->redirect($this->referer());
		}
	}
	
	
	
    public function finance()
    {
		Configure::write('debug',2);
        $this->autoRender = false;
        $url = "http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/quote?format=json";
        $result = file_get_contents($url);
        $data = json_decode($result, true);
/*         foreach ($data as $item) {
            $arr_cur = explode('=', $item['resource']['fields']['symbol']);
            $currency = $arr_cur[0];

            $this->loadModel('Country');
            $this->Country->updateAll(
                array('Country.code' => $currency),
                array('Country.rate' => $item['resource']['fields']['price'])
            );
        } */

        pr($data);
    }


    public function update()
    {
        $this->autoRender = false;
        $url = "http://finance.yahoo.com/webservice/v1/symbols/allcurrencies/quote?format=json";
        $result = file_get_contents($url);
        $data = json_decode($result, true);
        //pr($data);
        foreach ($data['list']['resources'] as $item) {
          //  pr($item);
            $arr_cur = explode('=', $item['resource']['fields']['symbol']);
            $currency = $arr_cur[0];
            /*            $arrCurrency = array(
                            'currency' => $currency,
                            'rate' => $item['resource']['fields']['price'],
                        );*/
           /* $this->loadModel('Finance');
            $this->Finance->updateAll(

                array('Finance.rate' => $item['resource']['fields']['price']),
                array('Finance.code' => $currency)
            );*/

            $this->loadModel('Country');
            $this->Country->updateAll(

                array('Country.rate' => $item['resource']['fields']['price'],'Country.description' => '"'. $item['resource']['fields']['name'] .'"'),
                array('Country.currency' => $currency)
            );
        }
    }


    public function get_curr()
    {
        $this->autoRender = false;
        $amount = 1;
        $from_Currency = "USD";
        $to_Currency = "VND";

        $amount = urlencode($amount);
        $from_Currency = urlencode($from_Currency);
        $to_Currency = urlencode($to_Currency);

        $url = "http://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";

        $ch = curl_init();
        $timeout = 0;
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt ($ch, CURLOPT_USERAGENT,
            "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $rawdata = curl_exec($ch);
        curl_close($ch);
        $data = explode('bld>', $rawdata);
        $data = explode($to_Currency, $data[1]);

        return round($data[0], 2);
    }
	
	
	public function show_currency(){
		$currency = Cache::read('cache_currency','short');
		if(!$currency)
		{
			
            $currency = $this->Country->find('all',
                array('conditions' => array('Country.type' => 1,'Country.status' => 1),'recursive' => -1)
            );
            Cache::write('cache_currency',$currency,'short');
		}
		return $currency;
	}
}

?>