<?php 

namespace TEVENT_THEME\inc;
use TEVENT_THEME\Inc\Traits\Singleton;

class Meta_box {
    use Singleton;

    protected function __construct() {
        $this->set_hooks();
    }

    public function set_hooks() {

        add_action( "add_meta_boxes", [ $this, "add_custom_box" ] );
        add_action( "save_post", [ $this, "save_post_meta" ] );

    }

    public function save_post_meta( $post_id ) {
        $data = serialize( [
            "next" => $post_id,
            "previous" => $_POST["next-sequel"]
        ] );
        if( array_key_exists( "next-sequel", $_POST ) ) {
            update_post_meta(
                $post_id,
                "_choose_next_sequel",
                $data
            );
        }
    }
    public function add_custom_box() {

        // $screen array determines for what post_type this meta_box is used for
        $screens = [ "post" ];

        // Creating meta_boxes for each post_types

        foreach( $screens as $screen ) {
            add_meta_box(
                "_choose_next_sequel",
                __( "Connect it to the previous blog post?" ),
                [ $this, "custom_meta_box_html" ],
                $screen,
                "normal"
            );
        }

    }



    public function custom_meta_box_html( $post ) {

        // $value brings the old stored data of specific post
        $value = get_post_meta( $post->ID, "_choose_next_sequel", true );
        $data = unserialize( $value );

        extract( $data );
        wp_reset_query();

        $args = [
            "post_type" => "post",
            "post_status" => "publish"
        ];
        $query = new \WP_Query($args);
            if( $query->have_posts() ):
        ?>
            <label for="next-sequel">
                <select name="next-sequel" id="next_sequel">
                    <option value="-1">None</option>
                    <?php while( $query->have_posts() ): $query->the_post() ?>
                        <?php  ?>
                        <option value="<?php the_ID(); ?>" <?php selected($previous, get_the_ID()) ?>><?php the_title() ?></option>
                    <?php endwhile ?>
                </select>
            </label>
        <?php 
        endif;
    }

}


?>