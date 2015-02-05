<?php 

namespace BASE\Image;

require_once('settings.php'); 

class Image 
{
	public function __construct()
	{
		return 0;
	}

	public static function uploadImage($fields, $base_dir, $id)
	{
		$files = array();

		foreach($fields as $key => $val)
		{
			$finfo = new \finfo(FILEINFO_MIME_TYPE);

			if ( isset($_FILES[$key]) && $_FILES[$key]['tmp_name'] !== '' )
			{
				if (false === $ext = array_search(
					$finfo->file($_FILES[$key]['tmp_name']),
					array(
					    'jpg' => 'image/jpeg',
					    'png' => 'image/png',
					    'gif' => 'image/gif'
					),
					true
				)) 
				{
					throw new RuntimeException('Invalid file format.');
				}

				$fileName = sha1_file($_FILES[$key]['tmp_name']);

				if (!file_exists(UPLOAD_DIR . $base_dir . '/' . $id)) 
				{
    					mkdir(UPLOAD_DIR . $base_dir . '/' . $id, 0755, true);
				}

				if (
					!move_uploaded_file(
						$_FILES[$key]['tmp_name'],
						sprintf(UPLOAD_DIR . $base_dir . '/' . $id . '/%s.%s',
							$fileName,
							$ext
						)
					) 
				)
				{
					throw new RuntimeException('Failed to move uploaded file.');
				}
				else
				{
					$_POST[$key] = $fileName . '.' . $ext;

					// Generate Thumbnail!
					$this->_generateThumbnail( $base_dir, $id, $fileName, $ext );
				}
			}
		}

		return json_encode( array( 'success' => 'true' ) );
	}

	private function _generateThumbnail( $base_dir, $id, $file_name, $ext )
	{
		$thumb_path = UPLOAD_DIR . $base_dir . '/' . $id . 'thumb_' . $file_name . '.' . $ext;

		// Process Thumbnail here, however you may choose
	}
}
