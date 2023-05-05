<?php
/**
 * Avalon Menu Builder
 *
 * @package       AMB
 * @author        Sammy Hayman
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Avalon Menu Builder
 * Plugin URI:    https://avalonstudios.eu
 * Description:   Build a menu true
 * Version:       1.0.0
 * Author:        Sammy Hayman
 * Author URI:    https://avalonstudios.eu
 * Text Domain:   avalon-menu-builder
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Avalon Menu Builder. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.

if (!defined('ABSPATH')) exit;

// Include your custom code here.
require_once __DIR__ . '/app/Classes/Models/MenuBuilder.php';
