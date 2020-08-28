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
 * Gilb elementor services section widget.
 *
 * @since 1.0
 */
class Gilb_Services extends Widget_Base {

	public function get_name() {
		return 'gilb-services';
	}

	public function get_title() {
		return __( 'Services', 'gilb-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'gilb-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'services_content',
			[
				'label' => __( 'Services content', 'gilb-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'gilb-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'My Services', 'gilb-companion' )
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'gilb-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Take a look around some of my awesome works', 'gilb-companion' )
            ]
        );

        $this->add_control(
            'services_inner_settings_seperator',
            [
                'label' => esc_html__( 'Service Items', 'gilb-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'gilbservices', [
                'label' => __( 'Create Service', 'gilb-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'fonticon',
                        'label' => __( 'Font Icon', 'gilb-companion' ),
                        'type' => Controls_Manager::ICON,
                        'default' => 'flaticon-layers',
                        'options' => gilb_themify_icon()
                    ],
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'gilb-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'User experience design', 'gilb-companion' ),
                    ],
                    [
                        'name' => 'short_desc',
                        'label' => __( 'Short Brief', 'gilb-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle.', 'gilb-companion' ),
                    ],
                    [
                        'name' => 'anc_text',
                        'label' => __( 'Anchor Text', 'gilb-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Learn More', 'gilb-companion' ),
                    ],
                    [
                        'name' => 'anc_url',
                        'label' => __( 'Anchor URL', 'gilb-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                ],
                'default'   => [
                    [
                        'fonticon'      => 'flaticon-layers',
                        'label'         => __( 'User experience design', 'gilb-companion' ),
                        'short_desc'    => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle.', 'gilb-companion' ),
                        'anc_text'      => __( 'Learn More', 'gilb-companion' ),
                        'anc_url'       => ''
                    ],
                    [
                        'fonticon'      => 'flaticon-design',
                        'label'         => __( 'Digital Art', 'gilb-companion' ),
                        'short_desc'    => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle.', 'gilb-companion' ),
                        'anc_text'      => __( 'Learn More', 'gilb-companion' ),
                        'anc_url'       => ''
                    ],
                    [
                        'fonticon'      => 'flaticon-speaker',
                        'label'         => __( 'Social Media Marketing', 'gilb-companion' ),
                        'short_desc'    => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle.', 'gilb-companion' ),
                        'anc_text'      => __( 'Learn More', 'gilb-companion' ),
                        'anc_url'       => ''
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_service_section', [
                'label' => __( 'Style Service Heading', 'gilb-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

		//------------------------------ Services Style ------------------------------
		$this->start_controls_section(
			'style_serv_items_sec', [
				'label' => __( 'Style Services Item', 'gilb-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color', [
				'label' => __( 'Icon Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_part .single_service_part .single_service_text span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_bg_color', [
				'label' => __( 'Icon Bg Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_part .single_service_part .single_service_text span' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_color', [
				'label' => __( 'Title Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_part .single_service_part .single_service_text h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'txt_color', [
				'label' => __( 'Text Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_part .single_service_part .single_service_text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'anc_txt_color', [
				'label' => __( 'Anchor Text Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service_part .single_service_part .single_service_text .learn_btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

    $settings   = $this->get_settings();
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $services   = !empty( $settings['gilbservices'] ) ? $settings['gilbservices'] : '';
    ?>
    <!-- Service part start-->
    <section class="service_part padding_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_tittle text-center">
                        <p><?php echo esc_html( $sub_title )?></p>
                        <h2><?php echo esc_html( $sec_title )?></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <?php 
                if( is_array( $services ) && count( $services ) > 0 ) {
                    foreach( $services as $service ) {
                        $fonticon = ( !empty( $service['fonticon'] ) ) ? $service['fonticon'] : '';
                        $label = ( !empty( $service['label'] ) ) ? $service['label'] : '';
                        $short_desc = ( !empty( $service['short_desc'] ) ) ? $service['short_desc'] : '';
                        $anc_text = ( !empty( $service['anc_text'] ) ) ? $service['anc_text'] : '';
                        $anc_url = ( !empty( $service['anc_url']['url'] ) ) ? $service['anc_url']['url'] : '';
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_service_part">
                                <div class="single_service_text">
                                    <span class="<?php echo esc_attr( $fonticon )?>"></span>
                                    <h2><?php echo esc_html( $label )?></h2>
                                    <p><?php echo esc_html( $short_desc )?></p>
                                    <a href="<?php echo esc_url( $anc_url )?>" class="learn_btn"><?php echo esc_html( $anc_text )?></a>
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Service part end-->
    <?php

    }
	
}
