<?php

if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('app_url')) {
    /**
     * Helper to grab the application url.
     *
     * @return mixed
     */
    function app_url()
    {
        return config('app.url');
    }
}

if (! function_exists('app_imgur')) {
    /**
     * Helper to grab the application imgur.
     *
     * @return mixed
     */
    function app_imgur()
    {
        return config('app.imgur');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('home_route')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            if (auth()->user()->can('view backend')) {
                return 'admin.dashboard';
            }

            return 'frontend.user.dashboard';
        }

        return 'frontend.index';
    }
}
