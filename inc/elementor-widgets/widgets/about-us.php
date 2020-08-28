<?php
namespace Gilbelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



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
class Gilb_About_Us extends Widget_Base {

	public function get_name() {
		return 'gilb-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'gilb-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'gilb-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  About us content ------------------------------
        $this->start_controls_section(
            'left_content',
            [
                'label' => __( 'Left Content', 'gilb-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sec Title', 'gilb-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'about me', 'gilb-companion' ),
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Sec Text', 'gilb-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Good lights it very to above. Days image to sea. Over there seasons and spirit beast in. Greater bearing creepeth very behold fourth night morning seed moved.Good lights it very to above. Days image to sea. Over there seasons and spirit beast in. Greater bearing creepeth very behold fourth night morning seed moved.', 'gilb-companion' ),
            ]
        );
        $this->add_control(
            'exp_sec_sep',
            [
                'label' => esc_html__( 'Experience Summary Section', 'gilb-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'exp_years',
            [
                'label'         => esc_html__( 'Years of Experience', 'gilb-companion' ),
                'type'          => Controls_Manager::NUMBER,
                'label_block'  => true,
                'default'       => __( '07', 'gilb-companion' )
            ]
        );
        $this->add_control(
            'exp_first_line',
            [
                'label'         => esc_html__( 'Experience First Line', 'gilb-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'  => true,
                'default'       => __( 'Years of', 'gilb-companion' )
            ]
        );
        $this->add_control(
            'exp_sec_line',
            [
                'label'         => esc_html__( 'Experience Second Line', 'gilb-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'  => true,
                'default'       => __( 'Experiences', 'gilb-companion' )
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
            'sec_title_right',
            [
                'label' => esc_html__( 'Section Title', 'gilb-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block'  => true,
                'default'       => __( 'Experiences', 'gilb-companion' )
            ]
        );
        $this->add_control(
            'exp_items_sep',
            [
                'label' => esc_html__( 'Experiences Section', 'gilb-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'experiences', [
                'label' => __( 'Add Experience', 'gilb-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ exp_title }}}',
                'fields' => [
                    [
                        'name' => 'exp_title',
                        'label' => __( 'Experience Title', 'gilb-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Product designer', 'gilb-companion' ),
                    ],
                    [
                        'name' => 'exp_txt',
                        'label' => __( 'Experience Text', 'gilb-companion' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => __( 'at apple from 2011 to present', 'gilb-companion' ),
                    ],
                ],
                'default'   =>  [
                    [
                        'exp_title' => __( 'Product designer', 'gilb-companion' ),
                        'exp_txt'   => __( 'at apple from 2011 to present', 'gilb-companion' ),
                    ],
                    [
                        'exp_title' => __( 'UI designer', 'gilb-companion' ),
                        'exp_txt'   => __( 'at apple from 2011 to present', 'gilb-companion' ),
                    ],
                    [
                        'exp_title' => __( 'Print designer', 'gilb-companion' ),
                        'exp_txt'   => __( 'at apple from 2011 to present', 'gilb-companion' ),
                    ],
                    [
                        'exp_title' => __( 'Product designer', 'gilb-companion' ),
                        'exp_txt'   => __( 'at apple from 2011 to present', 'gilb-companion' ),
                    ],
                    [
                        'exp_title' => __( 'UI designer', 'gilb-companion' ),
                        'exp_txt'   => __( 'at apple from 2011 to present', 'gilb-companion' ),
                    ],
                    [
                        'exp_title' => __( 'Print designer', 'gilb-companion' ),
                        'exp_txt'   => __( 'at apple from 2011 to present', 'gilb-companion' ),
                    ],
                ]
            ]
        );

        $this->end_controls_section(); // End experience

        //------------------------------ Style title ------------------------------
        
        // Left Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Left Section Styles', 'gilb-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub title Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text h4' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sec_txt_col', [
				'label' => __( 'Text Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'exp_counter_col', [
				'label' => __( 'Experience Counter Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .about_text .experiance h2' => 'color: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();

        // Right Section Styles
        $this->start_controls_section(
            'right_sec_style', [
                'label' => __( 'Right Section Styles', 'gilb-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sub_title_col_right', [
				'label' => __( 'Sub Title Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .experiance_list h4' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'exp_title_col', [
				'label' => __( 'Experience Title Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .experiance_list .experiance_list_iner .single_experiance_list h5' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'exp_sub_title_col', [
				'label' => __( 'Experience Sub Title Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part .experiance_list .experiance_list_iner .single_experiance_list p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();

        // Background Styles
        $this->start_controls_section(
            'background_styles', [
                'label' => __( 'Background Styles', 'gilb-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sec_bg_col', [
				'label' => __( 'Section Bg Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_part' => 'background-color: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {
    $settings           = $this->get_settings();
    $sec_title          = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $sec_text           = !empty( $settings['sec_text'] ) ?  $settings['sec_text'] : '';
    $exp_years          = !empty( $settings['exp_years'] ) ?  $settings['exp_years'] : '';
    $exp_first_line     = !empty( $settings['exp_first_line'] ) ?  $settings['exp_first_line'] : '';
    $exp_sec_line       = !empty( $settings['exp_sec_line'] ) ?  $settings['exp_sec_line'] : '';
    $sec_title_right    = !empty( $settings['sec_title_right'] ) ?  $settings['sec_title_right'] : '';
    $experiences        = !empty( $settings['experiences'] ) ?  $settings['experiences'] : '';
    ?>
    <!-- about part start-->
    <section class="about_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about_text">
                        <?php
                            if ( $sec_title ) {
                                echo '<h4>'.esc_html( $sec_title ).'</h4>';
                            }
                            if ( $sec_text ) {
                                echo '<p>'.esc_html( $sec_text ).'</p>';
                            }
                        ?>
                        <div class="experiance">
                            <?php
                                if ( $exp_years ) {
                                    echo '<h2>'.esc_html( $exp_years ).'</h2>';
                                }
                                if ( $exp_first_line && $exp_sec_line) {
                                    echo '<p>'.esc_html( $exp_first_line ).' <span>'.esc_html( $exp_sec_line ).'</span</p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="experiance_list">
                        <?php
                            if ( $sec_title_right ) {
                                echo '<h4>'.esc_html( $sec_title_right ).'</h4>';
                            }
                        ?>
                        <div class="experiance_list_iner">
                            <?php
                                if( is_array( $experiences ) && count( $experiences ) > 0 ) {
                                    foreach( $experiences as $experience ) {
                                        $exp_title  = !empty( $experience['exp_title'] ) ? $experience['exp_title'] : '';
                                        $exp_txt    = !empty( $experience['exp_txt'] ) ? $experience['exp_txt'] : '';
                                    ?>
                                    <div class="single_experiance_list">
                                        <?php
                                            if ( $exp_title ) {
                                                echo '<h5>'.esc_html( $exp_title ).'</h5>';
                                            }
                                            if ( $exp_txt ) {
                                                echo '<p>'.esc_html( $exp_txt ).'</p>';
                                            }
                                        ?>
                                    </div>
                                    <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->
    <?php

    }
	
}
