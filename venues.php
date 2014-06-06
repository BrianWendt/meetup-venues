<form class="wrap" id="meetup-venues-settings" onsubmit="return false" autocomplete="off">
    <div id="nav-menus-frame">
        <div id="menu-settings-column">
            <div id="side-sortables" class="accordion-container">
                <ul class="outer-border">
                    <li class="control-section accordion-section open top">
                        <h3 class="accordion-section-title hndle">Templates</h3>
                        <div class="accordion-section-content">
                            <ul>
                                <?php
                                foreach (scandir(MeetupVenuesTemplates) as $file) {
                                    if (substr($file, -4) == 'html') {
                                        $template = pathinfo($file, PATHINFO_FILENAME);
                                        $default = ($template == 'events_list');
                                        echo '<li><label>';
                                        $checked = ($default) ? 'checked' : '';
                                        echo "<input type='radio' name='template' class='template' value='{$template}' {$checked} />";
                                        echo $file;
                                        if ($default) {
                                            echo ' <i>(default)</i>';
                                        }
                                        echo '</label></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <li class="control-section accordion-section open">
                        <h3 class="accordion-section-title hndle">Time Format</h3>
                        <div class="accordion-section-content">
                            <ul>
                                <li>
                                    <label>
                                        <input type='radio' name='date_format' class='date_format' value='' checked /> <?php echo date('l F jS, Y g:ia') ?> <i>(default)</i>
                                    </label>
                                </li>

                                <li>
                                    <label>
                                        <input type='radio' name='date_format' class='date_format' value='Y-m-d g:ia' /> <?php echo date('Y-m-d g:ia') ?>
                                    </label>
                                </li>

                                <li>
                                    <label>
                                        <input type='radio' name='date_format' class='date_format' value='m/d/Y g:ia' /> <?php echo date('m/d/Y g:ia') ?>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu-management-liquid">
            <div id="menu-management">
                <div class="menu-edit">
                    <div id="nav-menu-header">
                        <h2>Venue Search</h2>
                    </div>
                    <div class="post-body">
                        <table id="meetup-venues-search-table">
                            <tbody>
                                <tr>
                                    <th class="row">
                                        <label for="city">City, State & Country</label> <small>(required)</small>
                                    </th>
                                    <td>
                                        <input id="city" class="regular-text" type="text" placeholder="City Name"/>,
                                        <input id="state" class="regular-text" type="text" placeholder='State "CA"' maxlength="2"/>
                                        <input id="country" class="regular-text" type="text" placeholder='Country "US"' value="US" maxlength="2"/>
                                        <p class="description">Needed for narrowing down the results.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="row">
                                        <label for="search">Search Venues</label>
                                    </th>
                                    <td>
                                        <input id="search" class="regular-text" type="text" placeholder="Search by venue name" />
                                        <p><input id="submit" class="button button-primary" type="button" value="Search" name="submit"><p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div id="searching" style="display: none">
                            <p>Searching Venues...</p>
                        </div>

                        <div id="search_results" style="display: none">
                            <h2>Search Results</h2>
                            <table class="wp-list-table widefat fixed">
                                <thead>
                                    <tr>
                                        <th style="width:40px;"></th>
                                        <th style="width:100px">ID</th>
                                        <th style="width:300px">Venue Name</th>
                                        <th style="width:100px">Events</th>
                                        <th>Address</th>
                                        <th style="width:200px">City</th>
                                    </tr>
                                </thead>
                                <tbody id="search_results_list">

                                </tbody>
                            </table>
                        </div>
                        <div id="search_no_results" style="display: none">
                            <h3 style='text-align: center'>No venues found matching "<span id="search_span"></span>"</h3>
                        </div>
                    </div>
                </div>
                <div class="menu-edit">
                    <div id="nav-menu-header">
                        <h2>Shortcode Result</h2>
                    </div>
                    <div class="post-body">
                        <p><input type='text' id='shortcode' value='[meetup-venues id=""]' onfocus='this.select()' /></p>
                        <p class="description">Copy the generated shortcode where ever shortcodes are supported in your theme.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script><?php include_once __DIR__ . '/venues.js' ?></script>

<style>
    #shortcode { width: 100%; }
    #meetup-venues-search-table {
        width: 100%;
    }
    #meetup-venues-search-table th, #meetup-venues-search-table td {
        vertical-align: top;
    }
    #meetup-venues-search-table .row { width: 200px; }
    #meetup-venues-settings .post-body {
        background: none repeat scroll 0 0 #FFFFFF;
        border-bottom: 1px solid #DFDFDF;
        border-top: 1px solid #FFFFFF;
        padding: 0 10px 10px;
    }
    #city { width: 10em; }
    #state, #country { width: 7em; }
</style>