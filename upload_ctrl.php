<?php

class upload_ctrl extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->model('demandededevis', 'demandededevis', TRUE);
                $this->load->model('message', '', TRUE);
                $this->load->model('fichier', '', TRUE);
        }

        public function index()
        {
            session_start();
            $id = $this->uri->segment(3);
             $data['list']=$this->fichier->selectfichier($id);
         $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
 
            $this->load->view('header3',$data);
        $this->load->view('sidebarcommercial',$data);
       $this->load->view('uploadtest', array('error' => ' ' ));
        $this->load->view('footer3');


                
        }

        public function do_upload()
        {
            session_start();
                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;
//echo $config['upload_path'];
                $this->load->library('upload', $config);
$this->upload->initialize($config);
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                       $id= $this->input->post('id');
                        $data['list']=$this->fichier->selectfichier($id);
         $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
 
            $this->load->view('header3',$data);
        $this->load->view('sidebarcommercial',$data);

                        $this->load->view('uploadtest', $error,$data);
                        $this->load->view('footer3');

                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

 $fname= base_url().'assets/uploads/'.$this->upload->data('file_name');
 
$data = array( 'num_demande_devis' => $this->input->post('id'),
'url_fichier' =>$fname );
 $this->fichier->ajouterfichier($data);
 echo "téléchargement effectuer avec succés";
  $id= $this->input->post('id');
                        $data['list']=$this->fichier->selectfichier($id);
       

         $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
 
            $this->load->view('header3',$data);
        $this->load->view('sidebarcommercial',$data);
       $this->load->view('uploadtest', array('error' => ' ' ),$data);
        $this->load->view('footer3');
             }
        }
}
?>