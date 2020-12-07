const 
    fs = require("fs").promises,
    sass = require("node-sass")

const 
    sass_include_paths = [
        "./assets/sass/"
    ],
    main_out_file_path = "./assets/css/main.css",
    noscript_out_file_path = "./assets/css/noscript.css"

sass.render({
    file: "./assets/sass/main.scss",
    includePaths: sass_include_paths,
    outFile: main_out_file_path,
}, async (err, result) => { 

    if (err) {
        throw err
    }

    await fs.writeFile(main_out_file_path, result.css)
    
})

sass.render({
    file: "./assets/sass/noscript.scss",
    includePaths: sass_include_paths,
    outFile: noscript_out_file_path,
}, async (err, result) => {
    
    if (err) {
        throw err
    }

    await fs.writeFile(noscript_out_file_path, result.css)
    
})
  