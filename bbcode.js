function bbcode(text){
var input = new String(text);
var output;
search = new Array(
          /\[c\:(.*?)\](.*?)\[\/c\]/mig,
	      /\[a\:(left|center|right|justify)\](.*?)\[\/a\]/mig,
          /\[b\](.*?)\[\/b\]/mig,
          /\[i\](.*?)\[\/i\]/mig,
          /\[u\](.*?)\[\/u\]/mig,
          /\[font\:(.*?)\](.*?)\[\/font\]/mig,
          /\[size\:(.*?)\](.*?)\[\/size\]/mig,
          /\[br\]/mig);

replace = new Array(
          "<span style=\"color: $1\;\">$2</span>",
          "<div style=\"text-align: $1;\">$2</span>",
          "<b>$1</b>",
          "<i>$1</i>",
          "<u>$1</u>",
          "<span style=\"font-family: $1;\">$2</span>",
          "<span style=\"font-size: $1;\">$2</span>",
          "<br />");
for(i = 0; i < search.length; i++) {
     input = input.replace(search[i],replace[i]);
}
return input;
}
