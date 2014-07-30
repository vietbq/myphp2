<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');
     var $paginate = array();
	public function index() {
             $this->paginate = array(
                                'limit' => 4,
                                'order' => array('title' => 'desc'),
                             );
        $data = $this->paginate("Post"); $this->paginate = array(
                                'limit' => 4,
                                'order' => array('title' => 'desc'),
                             );
        $data = $this->paginate("Post");
        $this->set('posts', $data);
    }
	public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
	
	public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is('post') || $this->request->is('put')) {
        $this->Post->id = $id;
        if ($this->Post->save($this->request->data)) {
            $this->Session->setFlash('Your post has been updated.');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Unable to update your post.');
        }
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}
public function copy($title,$body){
    	
     if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }
       
     if($this->Post->save(array('title'=>$title,'body'=>$body)))
 // if ($this->Post->save($this->request->data)){
     {
        $this->Session->setFlash(
           __('The post has been copied.')
     );}
        return $this->redirect(array('action' => 'index'));
    }


public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Post->delete($id)) {
        $this->Session->setFlash(
            __('The post with id: %s has been deleted.', h($id))
        );
        return $this->redirect(array('action' => 'index'));
    }
}
public function add() {
    if ($this->request->is('post')) {
        //Added this line
        $this->request->data['Post']['user_id'] = $this->Auth->user('id');
        if ($this->Post->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been saved.'));
            return $this->redirect(array('action' => 'index'));
        }
    }
}
public function isAuthorized($user) {
    // All registered users can add posts
    if ($this->action === 'add') {
        return true;
    }

    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $postId = (int) $this->request->params['pass'][0];
        if ($this->Post->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}
}

?>