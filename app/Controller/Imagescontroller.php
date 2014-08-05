<?php
class ImagesController extends AppController {

    var $name = 'Images';
    var $helpers = array('Html', 'Form');
    var $components = array('Upload');      // nạp Component upload
    
    
    function index(){
        $images = $this->Image->find("all");
        $this->set("images",$images);
    }
    
    function upload() {

            if (empty($this->data)) {
                    $this->render();
            } else {
          
                    $data = $this->data;

                    // đường dẫn tới thu mục upload file ảnh
                    $destination = realpath('../../app/webroot/img/uploads/') . '/';

                    // grab the file
                    $file = $this->data['Image']['filedata'];

                    // cấu hình upload
                    $rule = array(
                                    'type' => 'resizemin',
                                    'size' => array('400', '300'),
                                    'output' => 'jpg',
                                );
            
                    $result = $this->Upload->upload($file, $destination, null, $rule);

                    if (!$this->Upload->errors){

                            $data['Image']['images'] = $this->Upload->result;

                    } else {
                            // display error
                            $errors = $this->Upload->errors;

                            // piece together errors
                            if(is_array($errors)){ $errors = implode("<br />",$errors); }

                                    $this->Session->setFlash($errors);
                                    $this->redirect('/images/upload');
                                    exit();
                    }

                    if ($this->Image->save($data)) {
                            $this->Session->setFlash('Image has been added.');
                            $this->redirect('/images/index');
                    } else {
                            $this->Session->setFlash('Please correct errors below.');
                            unlink($destination.$this->Upload->result);
                    }
        }
    }
}
?>