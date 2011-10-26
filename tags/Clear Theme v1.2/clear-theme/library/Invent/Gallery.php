<?php
class Invent_Gallery{

	public function updateMetaData($postId, $name, $value){
		if(trim($value)) {
			$oldValue = get_post_meta($postId, $name, true);

			if(!$oldValue) {
				add_post_meta($postId, $name, $value);
			}
			else
				update_post_meta($postId, $name, $value);
		} else {
			delete_post_meta($postId, $name);
		}

	}
	public function saveGalleryItem($itemId, $post) {
		$value = isset($_POST['_invent_thumb']) ? $_POST['_invent_thumb'] : null;
		$post_id = $post->post_parent;
		$this->updateMetaData($post_id, '_invent_thumb', 'COKOLWIEK');
		print_r($itemId);
		print_r($post);
		echo 'DZIALA!'; die;
	}


}
?>
