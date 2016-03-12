<?php 
	/*
	Plugin Name: WBRD Book
	Plugin URI: http://webroad.pl/cms/6064-tworzenie-wtyczki-wordpress-4
	Description: Wtyczka umieszczająca okładkę książki jako widżet
	Version: 1.0
	Author: Michal Kortas
	Author URI: http://webroad.pl
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	*/
?>
<?php 

class wbrd_book extends WP_Widget
{
public function __construct()
{
	add_action('widgets_init', array($this, 'wbrd_book_init'));
	$widget_details = array(
		'classname' => 'wbrd_book',
		'description' => 'Widżet, który wyświetli okładkę książki!'
	); 
	parent::__construct('wbrd_book', 'WBRD Book', $widget_details);
}
public function widget($args, $instance) {
	extract($args);
	echo $before_widget
		.$before_title
		.$instance['title']
		.$after_title;
	echo '<a href="http://helion.pl/view/6172k/bootpp.htm">'
	.'<img src="http://webroad.pl/banery/bootpp.jpg" alt="Książka Bootstrap">'
	.'</a>';
	echo $after_widget;
}
public function update($new_instance, $old_instance) {
	return $new_instance;
}
public function form($instance) {
	$title = esc_attr($instance['title']);
	?>
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">
			Tytuł:
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>">
		</label>
	</p>
	<?php 
}
public function wbrd_book_init() {
	register_widget('wbrd_book');
}
}
$wbrd_book = new wbrd_book();