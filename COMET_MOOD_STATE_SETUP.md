# WordPress Mood State Admin Setup - Instructions for Comet

## Overview
Create a WordPress admin interface to manage the site's active mood state (color scheme). The site has three mood states representing different states of mind, each with its own primary color.

## Mood States & Colors
1. **Green (#23F80B)** - "Focus and Positivity"
2. **Blue (#092EFF)** - "Tension and Introspection" (default)
3. **Purple (#B606FC)** - "Challenging Moment"

## Requirements

### 1. WordPress Options Page
Create a simple options page in the WordPress admin dashboard:

**Location:** Settings > Mood State
**Page Title:** "Mood State Settings"
**Menu Title:** "Mood State"

### 2. Admin Interface Elements

Create a settings page with:

1. **Page Header:**
   - Title: "Mood State Settings"
   - Description: "Select the current active mood state for your site. This will change the primary color throughout the entire website."

2. **Radio Button Group:**
   Create three radio buttons, each displaying:
   - Color preview (circular swatch showing the actual color)
   - State name
   - Description text

   Example layout for each option:
   ```
   ○ [Green Circle] Focus and Positivity
     A state of clarity and positive energy

   ○ [Blue Circle] Tension and Introspection (Default)
     A state of deep thought and calm tension

   ○ [Purple Circle] Challenging Moment
     A state of difficulty and growth
   ```

3. **Save Button:**
   - Standard WordPress "Save Changes" button
   - Show success message after saving

### 3. Technical Implementation

**Option Name:** `active_mood_state`

**Possible Values:**
- `green` (for #23F80B)
- `blue` (for #092EFF) - DEFAULT
- `purple` (for #B606FC)

**Default Value:** `blue`

### 4. Code Structure

Please create the following:

1. **Main Function:** `rine_mood_state_settings_init()`
   - Register the settings page
   - Add it to the Settings menu
   - Hook: `admin_menu`

2. **Settings Registration:** `rine_register_mood_state_settings()`
   - Register the option: `active_mood_state`
   - Hook: `admin_init`

3. **Render Function:** `rine_mood_state_settings_page()`
   - Output the settings page HTML
   - Include radio buttons with color previews
   - Use WordPress settings API

4. **Sanitization Callback:** `rine_sanitize_mood_state()`
   - Validate that only 'green', 'blue', or 'purple' values are accepted
   - Default to 'blue' if invalid

### 5. Styling Requirements

Add inline CSS to the admin page for:
- Color swatches: circular, 40px diameter, display the actual hex color
- Radio button layout: clear spacing, easy to click
- Responsive design for mobile admin access

### 6. File Location

Add this code to the theme's `functions.php` file.

### 7. Security

- Use WordPress nonces for form security
- Sanitize all inputs
- Escape all outputs
- Check user capabilities (manage_options)

### 8. Additional Features (Optional but Recommended)

1. **Current State Display:**
   - Show which mood state is currently active
   - Display it prominently at the top of the settings page

2. **Preview:**
   - Optional: Add a small preview showing how the color affects the site
   - Could be a small mockup or color block

3. **Translation Ready:**
   - Text domain: `rine2`
   - Make all strings translatable using `__()` or `esc_html_e()`

## Expected Behavior

When an admin selects a mood state and saves:
1. The option `active_mood_state` is updated in the database
2. The frontend uses `get_option('active_mood_state')` to determine which button is active
3. The JavaScript handles the actual color switching on the client side
4. Changes are visible immediately on page refresh

## Testing Checklist

After implementation, verify:
- [ ] Settings page appears under Settings menu
- [ ] All three mood states are selectable
- [ ] Default state is 'blue' on fresh install
- [ ] Saving works and shows success message
- [ ] Invalid values are rejected and default to 'blue'
- [ ] Frontend displays the correct active state
- [ ] Color swatches display correctly
- [ ] Page is mobile-responsive in admin

## Notes

- This is for ADMIN ONLY - client-side users will click buttons on the frontend to temporarily change colors (not saved)
- Admin changes persist in the database
- The frontend PHP checks `get_option('active_mood_state')` to set the initial active state
- JavaScript handles real-time color switching without page reload

## Example Code Structure

```php
<?php
// Add to functions.php

// Hook into admin menu
add_action('admin_menu', 'rine_mood_state_settings_init');

// Hook into admin init
add_action('admin_init', 'rine_register_mood_state_settings');

function rine_mood_state_settings_init() {
    // Add settings page under Settings menu
    add_options_page(
        __('Mood State Settings', 'rine2'),
        __('Mood State', 'rine2'),
        'manage_options',
        'mood-state-settings',
        'rine_mood_state_settings_page'
    );
}

function rine_register_mood_state_settings() {
    // Register setting with sanitization
    register_setting(
        'rine_mood_state_options',
        'active_mood_state',
        array(
            'type' => 'string',
            'sanitize_callback' => 'rine_sanitize_mood_state',
            'default' => 'blue'
        )
    );
}

function rine_sanitize_mood_state($input) {
    // Validate and sanitize
    $valid_states = array('green', 'blue', 'purple');
    return in_array($input, $valid_states) ? $input : 'blue';
}

function rine_mood_state_settings_page() {
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }

    // Get current value
    $current_state = get_option('active_mood_state', 'blue');

    // Mood states data
    $mood_states = array(
        'green' => array(
            'color' => '#23F80B',
            'title' => __('Focus and Positivity', 'rine2'),
            'description' => __('A state of clarity and positive energy', 'rine2')
        ),
        'blue' => array(
            'color' => '#092EFF',
            'title' => __('Tension and Introspection', 'rine2'),
            'description' => __('A state of deep thought and calm tension', 'rine2')
        ),
        'purple' => array(
            'color' => '#B606FC',
            'title' => __('Challenging Moment', 'rine2'),
            'description' => __('A state of difficulty and growth', 'rine2')
        )
    );

    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

        <p><?php esc_html_e('Select the current active mood state for your site. This will change the primary color throughout the entire website.', 'rine2'); ?></p>

        <form action="options.php" method="post">
            <?php
            settings_fields('rine_mood_state_options');
            do_settings_sections('rine_mood_state_options');
            ?>

            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><?php esc_html_e('Active Mood State', 'rine2'); ?></th>
                    <td>
                        <?php foreach ($mood_states as $state => $data) : ?>
                            <label style="display: flex; align-items: center; margin-bottom: 20px; cursor: pointer;">
                                <input
                                    type="radio"
                                    name="active_mood_state"
                                    value="<?php echo esc_attr($state); ?>"
                                    <?php checked($current_state, $state); ?>
                                    style="margin-right: 10px;"
                                >
                                <span
                                    style="width: 40px; height: 40px; border-radius: 50%; background-color: <?php echo esc_attr($data['color']); ?>; margin-right: 15px; display: inline-block; border: 2px solid #ddd;"
                                ></span>
                                <div>
                                    <strong><?php echo esc_html($data['title']); ?></strong>
                                    <br>
                                    <small style="color: #666;"><?php echo esc_html($data['description']); ?></small>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </td>
                </tr>
            </table>

            <?php submit_button(__('Save Changes', 'rine2')); ?>
        </form>
    </div>
    <?php
}
?>
```

This is a complete, working example. Feel free to improve the styling or add additional features as needed!
