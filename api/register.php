<?php
require_once  '../includes/config.php';

if(isset($_POST['register'])){
	function random_text( $type = 'alnum', $length = 12 ){
		switch ( $type ) {
			case 'alnum':
				$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				break;
			case 'alpha':
				$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				break;
			case 'hexdec':
				$pool = '0123456789abcdef';
				break;
			case 'numeric':
				$pool = '0123456789';
				break;
			case 'nozero':
				$pool = '123456789';
				break;
			case 'distinct':
				$pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
				break;
			default:
				$pool = (string) $type;
				break;
		}

		$crypto_rand_secure = function ( $min, $max ) {
			$range = $max - $min;
			if ( $range < 0 ) return $min; // not so random...
			$log    = log( $range, 2 );
			$bytes  = (int) ( $log / 8 ) + 1; // length in bytes
			$bits   = (int) $log + 1; // length in bits
			$filter = (int) ( 1 << $bits ) - 1; // set all lower bits to 1
			do {
				$rnd = hexdec( bin2hex( openssl_random_pseudo_bytes( $bytes ) ) );
				$rnd = $rnd & $filter; // discard irrelevant bits
			} while ( $rnd >= $range );
			return $min + $rnd;
		};

		$token = "";
		$max   = strlen( $pool );
		for ( $i = 0; $i < $length; $i++ ) {
			$token .= $pool[$crypto_rand_secure( 0, $max )];
		}
		return $token;
	}
	$random=random_text();
	
	if(mysqli_query($link, "INSERT INTO users 
						(users_email, users_pass, users_token, users_fname, users_lname, users_birthday, users_gender, users_phone) 
						VALUES 
						('".mysqli_real_escape_string($link, $_POST['email'])."',
						'".mysqli_real_escape_string($link, $_POST['password'])."',
						'".mysqli_real_escape_string($link, $random)."',
						'".mysqli_real_escape_string($link, $_POST['first_name'])."',
						'".mysqli_real_escape_string($link, $_POST['last_name'])."',
						'".mysqli_real_escape_string($link, date("Y-m-d", strtotime($_POST['birthday'])))."',
						'".mysqli_real_escape_string($link, $_POST['gender'])."',
						'".mysqli_real_escape_string($link, $_POST['phone'])."')"))
						{
						echo "success";
						}
						else {
							echo "error";
						}
								
}
?>