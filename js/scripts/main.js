requirejs.config({
    baseUrl: "js/scripts",
    paths: {
        "jquery": "vendor/jquery/dist/jquery",
        "bootstrap": "vendor/bootstrap/dist/js/bootstrap.min",
        "mustache": "vendor/mustache/mustache",
        "sha512": "vendor/sha512/sha512",
        "index": "index",
        "hashing": "hashing",
        "forms": "forms",
        "tables": "tables",
        "err_handler": "err_handling",
    },
    shim: {
    	"bootstrap": {
            deps: ["jquery"]
        },
        "err_handler": {
            deps: ["jquery", "bootstrap"]
        },
        "hashing": {
            deps: ["sha512"]
        },
        "forms": {
            deps: ["hashing"]
        }
    }
    
});

require(["index"]);