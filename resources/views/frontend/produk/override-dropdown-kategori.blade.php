<style>
	.cat_menu_container
{
	width: 293px;
	height: 100%;
	background: #0e8ce4;
	padding-left: 35px;
	cursor: pointer;
	z-index: 1;
}
.cat_menu_title
{
	height: 100%;
}
.cat_burger
{
	width: 18px;
	height: 14px;
}
.cat_burger span
{
	display: block;
	position: absolute;
	left: 0;
	width: 100%;
	height: 2px;
	background: #FFFFFF;
}
.cat_burger span:nth-child(2)
{
	top: 6px;
}
.cat_burger span:nth-child(3)
{
	top: 12px;
}
.cat_menu_text
{
	font-size: 18px;
	font-weight: 400;
	color: #FFFFFF;
	text-transform: uppercase;
	margin-left: 20px;
}
.cat_menu_container ul
{
	display: block;
	position: absolute;
	top: 100%;
	left: 0;
	visibility: hidden;
	opacity: 0;
	min-width: 100%;
	background: #FFFFFF;
	box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
	-webkit-transition: opacity 0.3s ease;
    -moz-transition: opacity 0.3s ease;
    -ms-transition: opacity 0.3s ease;
    -o-transition: opacity 0.3s ease;
    transition: all 0.3s ease;
}
.cat_menu_container > ul
{
	padding-top: 13px;
}
.cat_menu_container:hover .cat_menu
{
	visibility: visible;
	opacity: 1;
}
.cat_menu li
{
	display: block;
	position: relative;
	width: auto;
	height: 46px;
	border-bottom: solid 1px #f2f2f2;
	padding-left: 35px;
	padding-right: 30px;
	white-space: nowrap;
}
.cat_menu li.hassubs > a i
{
	display: block;
}
.cat_menu li a
{
	display: block;
	position: relative;
	font-size: 16px;
	font-weight: 300;
	color: #000000;
	line-height: 46px;
	-webkit-transition: all 200ms ease;
	-moz-transition: all 200ms ease;
	-ms-transition: all 200ms ease;
	-o-transition: all 200ms ease;
	transition: all 200ms ease;
}
.cat_menu li a:hover
{
	color: #0e8ce4;
}
.cat_menu li a i
{
	display: none;
	position: absolute;
	top: 50%;
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	-ms-transform: translateY(-50%);
	-o-transform: translateY(-50%);
	transform: translateY(-50%);
	right: 0;
	font-size: 12px;
}
.cat_menu li ul
{
	display: block;
	position: absolute;
	top: 35px;
	left: 100%;
	visibility: hidden;
	opacity: 0;
	width: 100%;
	background: #FFFFFF;
	box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
}
.cat_menu li:hover > ul
{
	top: 0;
	visibility: visible;
	opacity: 1;
}
</style>