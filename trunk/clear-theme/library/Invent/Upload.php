<?php
class Invent_Upload {

	public function ajaxUpload() {
		global $wpdb;

		$optionId = $_POST['optionId']; // Acts as the name

		if ($_POST['type'] == 'upload') {

			$override = Array();
			$override['test_form'] = false;
			$override['action'] = 'wp_handle_upload';

			$filename = $_FILES[$optionId];

			$uploaded_file = wp_handle_upload($filename, $override);

//						$upload_tracking[] = $fileId;

			if (!empty($uploaded_file['error'])) {
				echo json_encode(array("error" => "Upload Error: " . $uploaded_file['error']));
			} else {

				$ext = pathinfo($uploaded_file['file']);
				$ext = strtolower($ext['extension']);
				if ($ext == 'ico') {
					// uploading ico file
					$thumb = $uploaded_file['url'];
				} else {
					include_once(TEMPLATEPATH.'/library/imageCreator.php');
					$image = new imageCreator($uploaded_file['file']);
					if (!$image->error) {

						if (isset($_POST['size'])) {
							$thSize = explode('x', $_POST['size']);
							if (!isset($thSize[0]))
								$thSize[0] = 50;
							if (!isset($thSize[1]))
								$thSize[1] = 50;

							$thSize[0] = (int) $thSize[0];
							$thSize[1] = (int) $thSize[1];

							if ($thSize[0] <= 0)
								$thSize[0] = 50;
							if ($thSize[1] <= 0)
								$thSize[1] = 50;
							if (isset($thSize[2]) && $thSize[2] == 'crop')
								$thSize[2] = true;
							else
								$thSize[2] = false;
						}
						else
							$thSize = Array(50, 50, false);

						if ($image->createPNG(Invent_Admin::getThumbnailPath($uploaded_file['file']), $thSize[0], $thSize[1], $thSize[2])) {

							$thumb = Invent_Admin::getThumbnailPath($uploaded_file['url']);
						}
					}
				}

				update_option($optionId, $uploaded_file['url']);

				echo json_encode(array(
					"optionId" => $optionId,
					"url" => $uploaded_file['url'],
					"thumb" => $thumb
				));
			}
		}
		/* 		elseif($_POST['type'] == 'image_reset'){

		  if(!isset($_POST['referer']))
		  delete_option($clickedID);
		  else
		  delete_post_meta($_POST['referer'] , $clickedID, get_post_meta($_POST['referer'] , $clickedID, true));
		  }
		 */

		die();
	}

	public function init() {
		add_action('wp_ajax_invent_ajax_post_action', Array($this, 'ajaxUpload'));
	}

}