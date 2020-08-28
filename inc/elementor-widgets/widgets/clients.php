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
 * Gilb elementor clients widget.
 *
 * @since 1.0
 */
class Gilb_Clients extends Widget_Base {

	public function get_name() {
		return 'gilb-clients';
	}

	public function get_title() {
		return __( 'Clients', 'gilb-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'gilb-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Clients content ------------------------------
		$this->start_controls_section(
			'cta_content',
			[
				'label' => __( 'Clients content', 'gilb-companion' ),
			]
		);
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'gilb-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Word from my clients', 'gilb-companion' )
            ]
        );

        $this->add_control(
            'clients', [
                'label' => __( 'Add A Client', 'gilb-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name' => 'rev_txt',
                        'label' => __( 'Review Text', 'gilb-companion' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle stars first cattle was had spirit you\'re thing, night darkness. Which itself stars', 'gilb-companion' ),
                    ],
                    [
                        'name' => 'client_img',
                        'label' => esc_html__( 'Client Image', 'gilb-companion' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'client_name',
                        'label' => __( 'Client Name', 'gilb-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Mosan Cameron', 'gilb-companion' ),
                    ],
                    [
                        'name' => 'client_desig',
                        'label' => __( 'Client Designation', 'gilb-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Creative Director', 'gilb-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'rev_txt'       => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle stars first cattle was had spirit you\'re thing, night darkness. Which itself stars', 'gilb-companion' ),
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'gilb-companion' ),
                        'client_desig'  => __( 'Creative Director', 'gilb-companion' ),
                    ],
                    [
                        'rev_txt'       => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle stars first cattle was had spirit you\'re thing, night darkness. Which itself stars', 'gilb-companion' ),
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'gilb-companion' ),
                        'client_desig'  => __( 'Creative Director', 'gilb-companion' ),
                    ],
                    [
                        'rev_txt'       => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle stars first cattle was had spirit you\'re thing, night darkness. Which itself stars', 'gilb-companion' ),
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'gilb-companion' ),
                        'client_desig'  => __( 'Creative Director', 'gilb-companion' ),
                    ],
                    [
                        'rev_txt'       => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle stars first cattle was had spirit you\'re thing, night darkness. Which itself stars', 'gilb-companion' ),
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'gilb-companion' ),
                        'client_desig'  => __( 'Creative Director', 'gilb-companion' ),
                    ],
                    [
                        'rev_txt'       => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle stars first cattle was had spirit you\'re thing, night darkness. Which itself stars', 'gilb-companion' ),
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'gilb-companion' ),
                        'client_desig'  => __( 'Creative Director', 'gilb-companion' ),
                    ],
                    [
                        'rev_txt'       => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle stars first cattle was had spirit you\'re thing, night darkness. Which itself stars', 'gilb-companion' ),
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'gilb-companion' ),
                        'client_desig'  => __( 'Creative Director', 'gilb-companion' ),
                    ],
                ]
            ]
        );

		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Sub Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_subtitle', [
				'label' => __( 'Style Sub Title', 'gilb-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sec_title_col', [
				'label' => __( 'Section Title Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_part .section_tittle p' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
            'rev_styles_sep',
            [
                'label' => esc_html__( 'Reviews Style Section', 'gilb-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
		$this->add_control(
			'rev_txt_col', [
				'label' => __( 'Review Text Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_part .client_review_single .client_review_text > p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'client_name_col', [
				'label' => __( 'Client Name Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_part .client_review_single .client_review_text h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'client_desig_col', [
				'label' => __( 'Client Designation Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_part .client_review_single .client_review_text .client_review_img p' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
            'sec_bg_styles_sep',
            [
                'label' => esc_html__( 'Section BG Style', 'gilb-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
		$this->add_control(
			'sec_bg_col', [
				'label' => __( 'Section Bg Color', 'gilb-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_part' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

	}

    protected function render() {

    // call load widget script
    $this->load_widget_script();
    $settings = $this->get_settings();
    $subtitle = !empty( $settings['subtitle'] ) ? $settings['subtitle'] : '';
    $reviews = !empty( $settings['clients'] ) ? $settings['clients'] : '';

    function gilb_get_single_review_item( $rev_txt, $client_img, $client_name, $client_desig ) { ?>
        <div class="client_review_single">
            <div class="client_review_text">
            <p><?php echo esc_html( $rev_txt )?></p>
                <div class="client_review_img">
                    <?php
                        if ( $client_img ) {
                            echo $client_img;
                        }
                    ?>
                    <h4><?php echo esc_html( $client_name )?></h4>
                    <p><?php echo esc_html( $client_desig )?></p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <!--::review_part start::-->
    <section class="review_part section_padding">
        <div class="container">
           <div class="row">
              <div class="col-xl-5">
                 <div class="section_tittle">
                    <p><?php echo esc_html( $subtitle )?></p>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-lg-12">
                <div class="client_review_part owl-carousel">
                    <?php
                    if( is_array( $reviews ) && count( $reviews ) > 0 ){
                        foreach ( $reviews as $review ) {
                            $rev_txt        = !empty( $review['rev_txt'] ) ? $review['rev_txt'] : '';
                            $client_img     = !empty( $review['client_img']['id'] ) ? wp_get_attachment_image( $review['client_img']['id'], 'gilb_review_client_thumb_90x90', '', array('alt' => 'client image' ) ) : '';
                            $client_name    = !empty( $review['client_name'] ) ? $review['client_name'] : '';
                            $client_desig   = !empty( $review['client_desig'] ) ? $review['client_desig'] : '';

                            gilb_get_single_review_item( $rev_txt, $client_img, $client_name, $client_desig );
                        }
                    }
                    ?>
                </div>
              </div>
           </div>
        </div>
    </section>
     <!--::review_part end::-->

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            var review = $('.client_review_part');
            if (review.length) {
                review.owlCarousel({
                items: 2,
                loop: true,
                dots: true,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 5000,
                nav: false,
                margin: 20,
                responsive:{
                    0:{
                        items:1,
                        dots: false
                    },
                    600:{
                        items:2,
                    }
                }
                });
            }
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
