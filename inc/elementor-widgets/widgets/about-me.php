<?php
namespace Gilbelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Gilb elementor about us section widget.
 *
 * @since 1.0
 */
class Gilb_My_Philosophy extends Widget_Base {

	public function get_name() {
		return 'gilb-my-philosophy';
	}

	public function get_title() {
		return __( 'My Philosophy', 'gilb-companion' );
	}

	public function get_icon() {
		return 'eicon-slideshow';
	}

	public function get_categories() {
		return [ 'gilb-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  My Philosophy content ------------------------------
        $this->start_controls_section(
            'my_philosophy_content',
            [
                'label' => __( 'My Philosophy Content', 'gilb-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'gilb-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'My philosophy', 'gilb-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'gilb-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Always work harder and create awesome products', 'gilb-companion' ),
            ]
        );
        $this->add_control(
            'about_txt',
            [
                'label'         => esc_html__( 'About Text', 'martine' ),
                'description'   => esc_html__('Use <br> tag for line break', 'martine'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<p>Waters make fish every without firmament saw had. Morning air subdue. Our. Air very one. Whales grass is fish whales winged night yielding land creeping that seed appear were bearing.</p><p>Waters make fish every without firmament saw had. Morning air subdue. Our. Air very one. Whales grass is fish whales winged night yielding land creeping that seed appear were bearing.</p><p>Waters make fish every without firmament saw had. Morning air subdue. Our. Air very one. Whales grass is fish whales winged night yielding land creeping that seed appear were bearing.</p>', 'martine' )
            ]
        );
        $this->end_controls_section(); // End about us content

        // ----------------------------------------  Right Section ------------------------------
        $this->start_controls_section(
            'right_section',
            [
                'label' => __( 'Right Section', 'gilb-companion' ),
            ]
        );
        $this->add_control(
            'about_img',
            [
                'label'         => esc_html__( 'Upload Image', 'buri' ),
                'type'          => Controls_Manager::MEDIA,
                'show_external' => false,
                'default'       => [
                    'url'       => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->end_controls_section(); // End experience

        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Title', 'gilb-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .philosophy_part .philophy_text h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .philosophy_part .philophy_text h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_txt_col', [
                'label' => __( 'Sec Text Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .philosophy_part .philophy_text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

    
	protected function render() {
    $settings       = $this->get_settings();
    $sub_title      = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $sec_text       = !empty( $settings['about_txt'] ) ?  $settings['about_txt'] : '';
    $about_img      = !empty( $settings['about_img']['id'] ) ? wp_get_attachment_image( $settings['about_img']['id'], 'gilb_about_thumb_487x514', false, array( 'alt' => 'about image' ) ) : '';
    ?>

    <!-- philosophy part css start -->
    <section class="philosophy_part section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6">
                    <div class="philophy_text">
                        <h5><?php echo esc_html( $sub_title )?></h5>
                        <h2><?php echo esc_html( $sec_title )?></h2>
                        <?php echo wp_kses_post(wpautop( $sec_text ))?>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="philophy_img">
                        <?php
                            if ( $about_img ) {
                                echo wp_kses_post( wpautop( $about_img ) );
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- philosophy part css end -->
    <?php

    }
	
}
