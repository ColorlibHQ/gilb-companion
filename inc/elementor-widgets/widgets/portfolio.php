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
 * elementor portfolio section widget.
 *
 * @since 1.0
 */
class Gilb_Portfolio extends Widget_Base {

	public function get_name() {
		return 'gilb-portfolio';
	}

	public function get_title() {
		return __( 'Portfolio', 'gilb-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'gilb-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  portfolio settings ------------------------------
        $this->start_controls_section(
            'portfolio_content',
            [
                'label' => __( 'Portfolio Settings', 'gilb-companion' ),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'gilb-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'My Portfolio', 'gilb-companion' )
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'gilb-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Take a look around some of my awesome works', 'gilb-companion' )
            ]
        );

        $this->add_control(
            'portfolio_inner_settings_seperator',
            [
                'label' => esc_html__( 'Items per section', 'gilb-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'more_btn_label',
            [
                'label' => esc_html__( 'More Button Label', 'gilb-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'More works', 'gilb-companion' )
            ]
        );

        $this->add_control(
            'more_btn_url',
            [
                'label' => esc_html__( 'More Button URL', 'gilb-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url'   => '#'
                ]
            ]
        );

        $this->add_control(
            'portfolio_style',
            [
                'label' => esc_html__( 'Select Portfolio Style', 'gilb-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'style1',
                'options'   => [
                    'style1' => esc_html__( 'Link to post', 'gilb-companion' ),
                    'style2' => esc_html__( 'Link to Popup', 'gilb-companion' ),
                ]
            ]
        );

        $this->add_control(
            'portfolio_number',
            [
                'label' => esc_html__( 'Portfolio Item Number', 'gilb-companion' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => 5
            ]
        );

        $this->end_controls_section(); // End portfolio settings


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
                    '{{WRAPPER}} .portfolio_part .section_tittle p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio_part .section_tittle h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_styles_sep',
            [
                'label' => esc_html__( 'Button Section', 'gilb-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'btn_txt_col', [
                'label' => __( 'Button Text Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio_part .btn_2' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'btn_border_col', [
                'label' => __( 'Button Border Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio_part .btn_2' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_hvr_txt_col', [
                'label' => __( 'Button Hover Text Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio_part .btn_2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'btn_hvr_border_col', [
                'label' => __( 'Button Hover Border Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio_part .btn_2:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'portfolio_item_style_sep',
            [
                'label' => esc_html__( 'Portfolio Item Style', 'gilb-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'item_hvr_bg_col', [
                'label' => __( 'Hover Background Color', 'gilb-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio_part .grid-item:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $this->load_widget_script();
        $portfolio_page_id = get_page_by_title( 'My Portfolios' )->ID;
        $portfolio_page_url = get_page_link($portfolio_page_id);
        $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
        $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
        $more_btn_label = !empty( $settings['more_btn_label'] ) ? $settings['more_btn_label'] : '';
        $more_btn_url = !empty( $settings['more_btn_url']['url'] ) ? $settings['more_btn_url']['url'] : $portfolio_page_url;
        $portfolio_number = !empty( $settings['portfolio_number'] ) ? $settings['portfolio_number'] : '';
        $portfolio_style = !empty( $settings['portfolio_style'] ) ? $settings['portfolio_style'] : '';
        ?>

    <!-- portfolio part start -->
    <section class="portfolio_part section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_tittle">
                        <p><?php echo esc_html( $sub_title )?></p>
                        <h2><?php echo esc_html( $sec_title )?></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section_btn text-right">
                        <a href="<?php echo esc_url( $more_btn_url )?>" class="btn_2"><?php echo esc_html( $more_btn_label )?></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mesonary_part">
                        <div class="grid">
                            <div class="grid-sizer"></div>
                            <?php
                                echo gilb_portfolio_section( $portfolio_number, $portfolio_style );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio part end -->

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            $('.grid').masonry({
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer',
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
