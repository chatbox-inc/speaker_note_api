const jsonRefs = require("json-refs")

var fs = require('fs')
var YAML = require('js-yaml')

const dumpFilesForDir = (target) => {
    const basePath = `./documents/swagger/${target}/`
    const outPath = `./static/api/${target}/`


    fs.readdir(basePath, async (err, files) => {
        console.log(files)
        if (err) throw err
        const fileList = files.filter((file) => {
            return /.*\.yml$/.test(file) //絞り込み
        })
        const options = {
            loaderOptions: {
                processContent: function (res, callback) {
                    callback(undefined, YAML.safeLoad(res.text))
                }
            }
        }

        if (!fs.existsSync(outPath)) {
            fs.mkdirSync(outPath)
        }

        for(let file of fileList){
            let result = await jsonRefs.resolveRefsAt(basePath+file,options)
            fs.writeFileSync( outPath + file.replace(".yml",".json") ,JSON.stringify(result.resolved) )
        }
    })
}


dumpFilesForDir("news")
dumpFilesForDir("members")
