<?php
class My_Custom_Test_Widget extends \Elementor\Widget_Base {

    // 1. Unique ID of the widget (slug)
    public function get_name() {
        return 'my_test_widget';
    }

    // 2. Title seen by the user
    public function get_title() {
        return 'Travel Custom Card';
    }

    // 3. Icon for the sidebar (FontAwesome)
    public function get_icon() {
        return 'eicon-post-list';
    }

    // 4. Category in the sidebar
    public function get_categories() {
        return [ 'general' ];
    }

    // 5. THE SIDEBAR CONTROLS (Inputs)
    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'Content Settings',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'card_title',
            [
                'label' => 'Title',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'Slovenia Trip',
            ]
        );

        $this->end_controls_section();
    }

    // 6. THE FRONTEND OUTPUT
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="custom-card">
            <h2><?php echo wp_kses_post( $settings['card_title'] ); ?></h2>
        </div>
        <?php
    }
}