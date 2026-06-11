<?php
/**
 * Equestrian Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Equestrian_Theme
 */

if ( ! function_exists( 'equestrian_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function equestrian_theme_setup() {
		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/styles.css' );
	}
endif;
add_action( 'after_setup_theme', 'equestrian_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function equestrian_theme_scripts() {
	wp_enqueue_style( 'equestrian-theme-style', get_template_directory_uri() . '/assets/styles.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script( 'equestrian-theme-app', get_template_directory_uri() . '/assets/app.js', array(), wp_get_theme()->get( 'Version' ), true );
    
    // React and Babel for Tweaks (Keeping it same as original static version)
    wp_enqueue_script( 'react', 'https://unpkg.com/react@18.3.1/umd/react.development.js', array(), '18.3.1', true );
    wp_enqueue_script( 'react-dom', 'https://unpkg.com/react-dom@18.3.1/umd/react-dom.development.js', array( 'react' ), '18.3.1', true );
    wp_enqueue_script( 'babel', 'https://unpkg.com/@babel/standalone@7.29.0/babel.min.js', array(), '7.29.0', true );

    // Enqueue tweaks bundle
    wp_enqueue_script( 'equestrian-theme-tweaks', get_template_directory_uri() . '/tweaks-panel.jsx', array( 'react', 'react-dom', 'babel' ), wp_get_theme()->get( 'Version' ), true );
    
    // Set script type to text/babel for the JSX file
    add_filter( 'script_loader_tag', function( $tag, $handle, $src ) {
        if ( 'equestrian-theme-tweaks' === $handle ) {
            $tag = '<script type="text/babel" src="' . esc_url( $src ) . '"></script>';
        }
        return $tag;
    }, 10, 3 );

    // Inline Tweaks init script
    $tweaks_init = "
        const TWEAK_DEFAULTS = {
            'accent': 'saddle',
            'hero': 'photo',
            'corners': 'soft'
        };

        const ACCENTS = {
            saddle: ['#C0612E', '#A04E22', '#F0DCC8'],
            clay:   ['#B24A39', '#95392B', '#EFD6CF'],
            honey:  ['#CF8B2E', '#AE7220', '#F3E3C6'],
            sage:   ['#6E8B6A', '#566F53', '#DDE6D8'],
            blue:   ['#5E7E8C', '#496673', '#D6E0E4'],
        };

        function App() {
            const [t, setTweak] = useTweaks(TWEAK_DEFAULTS);
            React.useEffect(() => {
                const r = document.documentElement;
                const a = ACCENTS[t.accent] || ACCENTS.saddle;
                r.style.setProperty('--accent', a[0]);
                r.style.setProperty('--accent-deep', a[1]);
                r.style.setProperty('--accent-soft', a[2]);
                const soft = t.corners === 'soft';
                r.style.setProperty('--radius', soft ? '14px' : '5px');
                r.style.setProperty('--radius-lg', soft ? '22px' : '7px');
                r.style.setProperty('--radius-sm', soft ? '9px' : '3px');
                document.body.classList.toggle('hero-plank-on', t.hero === 'plank');
            }, [t]);
            return (
                <TweaksPanel title='Tweaks'>
                    <TweakSection label='Brand colour' />
                    <TweakColor label='Accent' value={t.accent}
                        options={['saddle','clay','honey','sage','blue']}
                        onChange={(v) => setTweak('accent', v)} />
                    <TweakSection label='Hero' />
                    <TweakRadio label='Treatment' value={t.hero} options={['photo','plank']}
                        onChange={(v) => setTweak('hero', v)} />
                    <TweakSection label='Shape' />
                    <TweakRadio label='Corners' value={t.corners} options={['soft','sharp']}
                        onChange={(v) => setTweak('corners', v)} />
                </TweaksPanel>
            );
        }
        ReactDOM.createRoot(document.getElementById('tweak-root')).render(<App />);
    ";
    
    wp_add_inline_script( 'equestrian-theme-tweaks', $tweaks_init );
    // Note: To make wp_add_inline_script work with type="text/babel", we might need to filter it too
    add_filter( 'script_loader_tag', function( $tag, $handle, $src ) {
        if ( 'equestrian-theme-tweaks' === $handle && ! $src ) {
            $tag = str_replace( '<script ', '<script type="text/babel" ', $tag );
        }
        return $tag;
    }, 10, 3 );

    if ( file_exists( get_template_directory() . '/assets/image-slot.js' ) ) {
        wp_enqueue_script( 'equestrian-theme-image-slot', get_template_directory_uri() . '/assets/image-slot.js', array(), wp_get_theme()->get( 'Version' ), true );
    }
}
add_action( 'wp_enqueue_scripts', 'equestrian_theme_scripts' );
