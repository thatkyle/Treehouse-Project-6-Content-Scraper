const fs = require('fs');
const scrape = require('website-scraper');
const json2csv = require('json2csv').parse;
const cheerio = require('cheerio');
const dataFolder = './data';
const scrapeFolder = './scrapes';

if (!fs.existsSync(dataFolder)){
    fs.mkdirSync(dataFolder);
}

let deleteFolderRecursive = function(path) {
  if (fs.existsSync(path)) {
    fs.readdirSync(path).forEach(function(file, index){
      var curPath = path + "/" + file;
      if (fs.lstatSync(curPath).isDirectory()) {
        deleteFolderRecursive(curPath);
      } else {
        fs.unlinkSync(curPath);
      }
    });
    fs.rmdirSync(path);
  }
};

let options = {
  urls: ['http://shirts4mike.com/shirts.php'],
  directory: scrapeFolder,
  ignoreErrors: false,
  sources: [
    {selector: 'ul[class="products"] li a', attr: 'href'}
  ],
};

const parseCsv = json => {
  const fields = ['title', 'price', 'imgUrl', 'url', 'time'];
  const opts = { fields };
  try {
    const csv = json2csv(json, opts);
    return csv;
  } catch (err) {
    logError('./scraper-error.log', err);
  }
}

const logError = (errorFileName, err) => {
  const date = new Date();
  const today = date.toJSON();
  var stream = fs.createWriteStream(errorFileName, {flags:'a'});
  stream.write(`[${today}] ${err} \n`);
  console.log(`Error encountered during data retrieval:\n${err}\nError log updated at: ${errorFileName.slice(2)}`);
}

async function runScraper() {
  await deleteFolderRecursive(scrapeFolder);
  scrape(options).then((result) => {
    let jsonShirtData = [];
    let time = new Date();
    result[0].children.forEach(child => {
      const shirtData = {};                     
      const $ = cheerio.load(child.text);
      shirtData.title = $('title').text();
      shirtData.price = $('.price').text();
      shirtData.imgUrl = $('.shirt-picture span img').attr('src');
      shirtData.url = child.filename;
      shirtData.time = time.toJSON();
      jsonShirtData.push(shirtData);
    });
    return jsonShirtData;
  })
  .then((jsonShirtData) => {
    const csvShirtData = parseCsv(jsonShirtData);
    const date = new Date();
    const today = date.toJSON().slice(0,10);
    const successFileName = `./data/${today}.csv`;
    fs.writeFileSync(successFileName, csvShirtData);
    console.log(`Data successfully retrieved and written to ${successFileName.slice(1)}`);
  })
  .catch(err => logError('./scraper-error.log', err));
}

runScraper();
