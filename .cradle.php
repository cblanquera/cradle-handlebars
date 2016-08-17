<?php //-->

use Cradle\Handlebars\HandlebarsHandler;

//create a pseudo method
$cradle
    ->package('global')

    /**
     * Returns the global handlebars object
     *
     * @return Handlebars
     */
    ->addMethod('handlebars', function() {
        static $handlebars = null;

        if(is_null($handlebars)) {
            $handlebars = HandlebarsHandler::i()
                ->registerHelper('capital', include(__DIR__ . '/helpers/capital.php'))
                ->registerHelper('number', include(__DIR__ . '/helpers/number.php'))
                ->registerHelper('price', include(__DIR__ . '/helpers/price.php'))
                ->registerHelper('date', include(__DIR__ . '/helpers/date.php'))
                ->registerHelper('strip', include(__DIR__ . '/helpers/strip.php'))
                ->registerHelper('relative', include(__DIR__ . '/helpers/relative.php'))
                ->registerHelper('minirelative', include(__DIR__ . '/helpers/minirelative.php'))
                ->registerHelper('config', include(__DIR__ . '/helpers/config.php'))
                ->registerHelper('session', include(__DIR__ . '/helpers/session.php'))
                ->registerHelper('server', include(__DIR__ . '/helpers/server.php'))
                ->registerHelper('query', include(__DIR__ . '/helpers/query.php'))
                ->registerHelper('toquery', include(__DIR__ . '/helpers/toquery.php'))
                ->registerHelper('environment', include(__DIR__ . '/helpers/environment.php'))
                ->registerHelper('_', include(__DIR__ . '/helpers/translate.php'))
                ->registerHelper('key', include(__DIR__ . '/helpers/key.php'))
                ->registerHelper('in', include(__DIR__ . '/helpers/in.php'))
                ->registerHelper('implode', include(__DIR__ . '/helpers/implode.php'))
                ->registerHelper('explode', include(__DIR__ . '/helpers/explode.php'))
                ->registerHelper('pager', include(__DIR__ . '/helpers/pager.php'))
                ->registerHelper('when', include(__DIR__ . '/helpers/when.php'));
        }

        return $handlebars;
    })

    /**
     * Makes a rendered  template
     *
     * @return string
     */
    ->addMethod('template', function($file, array $data = array()) use ($cradle) {
        if(!file_exists($file)) {
            return null;
        }

        $template = file_get_contents($file);

        $compiled = $cradle
            ->package('global')
            ->handlebars()
            ->compile($template);

        return $compiled($data);
    });
