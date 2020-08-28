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
 * Gilb elementor hero section widget.
 *
 * @since 1.0
 */
class Gilb_Hero extends Widget_Base {

	public function get_name() {
		return 'gilb-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'gilb-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'gilb-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero Slider content', 'gilb-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'gilb-companion' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Hi there, This is Alex', 'gilb-companion' ),
            ]
        );
        $this->add_control(
            'big_title',
            [
                'label' => esc_html__( 'Big Title', 'gilb-companion' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Digital product designer', 'gilb-companion' ),
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label' => esc_html__( 'Button Label', 'gilb-companion' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Contact me', 'gilb-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'gilb-companion' ),
                'type'  => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        $this->end_controls_section(); // End Hero content
        
        // Right image
		$this->start_controls_section(
			'right_img_section',
			[
				'label' => __( 'Right Image content', 'gilb-companion' ),
			]
        );
        $this->add_control(
            'right_img',
            [
                'label' => esc_html__( 'Right Image', 'gilb-companion' ),
                'type'  => Controls_Manager::MEDIA,
                'label_block' => true
            ]
        );
		$this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
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
					'{{WRAPPER}} .banner_part .banner_text h5' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sec_title_col', [
				'label' => __( 'Section Title Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_part .banner_text h1' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'btn_styles_sep',
            [
                'label' => esc_html__( 'Button Style Section', 'gilb-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
			'btn_txt_col', [
				'label' => __( 'Button Text Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_part .banner_text .btn_1' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button Bg Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_part .banner_text .btn_1' => 'background-color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'btn_hvr_styles_sep',
            [
                'label' => esc_html__( 'Button Hover Style Section', 'gilb-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
			'btn_hvr_txt_col', [
				'label' => __( 'Button Hover Text Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_part .banner_text .btn_1:hover' => 'color: {{VALUE}} !important;',
				],
			]
        );

        $this->add_control(
			'btn_hvr_bg_col', [
				'label' => __( 'Button Hover Bg Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_part .banner_text .btn_1:hover' => 'background-color: {{VALUE}} !important;',
				],
			]
        );
        $this->add_control(
            'bg_styles_sep',
            [
                'label' => esc_html__( 'Background Section', 'gilb-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
			'sec_bg_col', [
				'label' => __( 'Section Bg Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_part' => 'background-color: {{VALUE}};',
				],
			]
        );
		$this->end_controls_section();
	}

	protected function render() {
    $settings = $this->get_settings();
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $big_title = !empty( $settings['big_title'] ) ? $settings['big_title'] : '';
    $btn_label = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
    $btn_url = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    $right_img = !empty( $settings['right_img']['url'] ) ? $settings['right_img']['url'] : '';
    ?>
    <!-- banner part start-->
    <section class="banner_part" <?php echo gilb_inline_bg_img( esc_url( $right_img ) ); ?>>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5><?php echo esc_html( $sub_title )?></h5>
                            <h1><?php echo esc_html( $big_title )?></h1>

                            <?php if( $btn_label ) { ?>
                                <div class="banner_btn">
                                    <a href="<?php echo esc_url( $btn_url )?>" class="btn_1"><?php echo esc_html( $btn_label )?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->
    
    <?php

    }
	
}
