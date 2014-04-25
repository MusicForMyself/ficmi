requirejs.config({
    baseUrl: "js/scripts",
    paths: {
        "jquery": "vendor/jquery/dist/jquery",
        "bootstrap": "vendor/bootstrap/dist/js/bootstrap.min",
        "index": "index",
        "err_handler": "err_handling"
    },
    shim: {
    	"bootstrap": {
            deps: ["jquery"]
        },
        "err_handler": {
            deps: ["jquery", "bootstrap"]
        }
    }
    
});

require(["index"]);