if(typeof(loc)=="undefined"||loc==""){var loc="";if(document.body){var tt=document.body.innerHTML.toLowerCase();var last=tt.indexOf("nbexample2.js\"");if(last>0){var first=tt.lastIndexOf("\"",last);if(first>0&&first<last)loc=document.body.innerHTML.substr(first+1,last-first-1);}}}

var bd=0
document.write("<style type=\"text/css\">");
document.write("\n<!--\n");
document.write(".nbexample2_menu {border-color:black;border-style:solid;border-width:"+bd+"px 0px "+bd+"px 0px;background-color:#847b69;position:absolute;left:0px;top:0px;visibility:hidden;}");
document.write(".nbexample2_plain:link, .nbexample2_plain:visited{text-align:left;background-color:#847b69;color:#ffffff;text-decoration:none;border-color:black;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:4px 0px 4px 0px;cursor:hand;display:block;font-size:10pt;font-family:Arial, Helvetica, sans-serif;}");
document.write(".nbexample2_plain:hover{background-color:#b5ff00;color:#000000;text-decoration:none;border-color:black;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:4px 0px 4px 0px;cursor:hand;display:block;font-size:10pt;font-family:Arial, Helvetica, sans-serif;}");
document.write(".nbexample2_l:link, .nbexample2_l:visited{text-align:left;background:#847b69 url("+loc+"nbexample2_l.gif) no-repeat right;;color:#ffffff;text-decoration:none;border-color:black;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:4px 0px 4px 0px;cursor:hand;display:block;font-size:10pt;font-family:Arial, Helvetica, sans-serif;}");
document.write(".nbexample2_l:hover{background:#b5ff00 url("+loc+"nbexample2_l2.gif) no-repeat right;color: #000000;text-decoration:none;border-color:black;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:4px 0px 4px 0px;cursor:hand;display:block;font-size:10pt;font-family:Arial, Helvetica, sans-serif;}");
document.write("\n-->\n");
document.write("</style>");

var fc=0x000000;
var bc=0xb5ff00;
if(typeof(frames)=="undefined"){var frames=0;}

startMainMenu("nbexample2_left.gif",27,7,2,0,0)
mainMenuItem("nbexample2_b1",".gif",27,104,"javascript:;","","Products",2,2,"nbexample2_plain");
mainMenuItem("nbexample2_b2",".gif",27,104,"javascript:;","","Links",2,2,"nbexample2_plain");
mainMenuItem("nbexample2_b3",".gif",27,104,"javascript:;","","Downloads",2,2,"nbexample2_plain");
endMainMenu("nbexample2_right.gif",27,7)

startSubmenu("nbexample2_b1_2","nbexample2_menu",113);
submenuItem("Sub menu item 1","javascript:;","","nbexample2_plain");
submenuItem("Sub menu item 2","javascript:;","","nbexample2_plain");
endSubmenu("nbexample2_b1_2");

startSubmenu("nbexample2_b1","nbexample2_menu",106);
submenuItem("Menu item 1","javascript:;","","nbexample2_plain");
mainMenuItem("nbexample2_b1_2","Menu item 2",0,0,"javascript:;","","",1,1,"nbexample2_l");
submenuItem("Menu item 3","javascript:;","","nbexample2_plain");
endSubmenu("nbexample2_b1");

loc="";
