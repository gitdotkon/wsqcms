<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wanda');

/** MySQL database username */
define('DB_USER', 'multiwp');

/** MySQL database password */
define('DB_PASSWORD', 'multiwp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         ' G+VT1?}3?GL KwtV.8^t+F.Z +A y~@S+mbIXZ1n9D+31@?CHU@+rq@DH1wKWYy');
define('SECURE_AUTH_KEY',  'D~hQFM3%S;D2Hq3{m^~BGZz`e^--.3b&c$3,2<jsFw<eIgO>z|yj48u:&s~+5E.Z');
define('LOGGED_IN_KEY',    ',[9S>(+un!%b17zEXx@%tON$_m3Np;kflLa`=SIS%%WWj 4oE>,K&YZ]**:G<!wW');
define('NONCE_KEY',        'YHCR8^;2%lv~o=+$uW0 2,2kD|)8)#B(bt+H1;(@D9W:Z|qN+V|vx~%|?FvwMWVd');
define('AUTH_SALT',        'GdRT_9{8MuK:.l%[+N3w[*U7NoUc(XFz=l]2+<?eA;6+[el doN2u-kimQYChHrl');
define('SECURE_AUTH_SALT', '0nXSd[KO3/p%]BXjva`BYed}=?+*jA^,US&(t-VTA[U[|9e?$xcY0N_sn+%T+fw-');
define('LOGGED_IN_SALT',   'P?jmXw1OyN.7Ueg7@19?;zuzC;f6y*&L{fxkXA<=KWLWKjR+C-G+t3}le# Bm|~*');
define('NONCE_SALT',       'fUh>*]%:RQ2sw=|,WBDFP&j_:)n|ci7N3)>-X]wH[MUF/WIk/.RA?6 rTk+/nh(3');


$table_prefix = 'wp_';




define('WP_DEBUG', false);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('FS_METHOD','direct');
