@extends('main')

@section('title', '| 关于骡子大总管')

@section('content')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 _box pb20">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-9">
					<h2>关于我 <small>一般人我不告诉TA</small></h2>
					<p class="lead text-justify">
						(/ω＼*)作为骡子大总管，爱技术，爱学习，爱游戏，爱动漫，爱运动。做事努力，负责，谦虚。喜欢新事物，喜欢多挑战，对技术以及创业充满渴望。迟早是社会的希望，祖国的栋梁!
					</p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
					<h2>
						<img class="img-responsive pull-right" src="http://or1edgicq.bkt.clouddn.com/luozi.png?imageView2/1/w/130/h/157">
					</h2>
				</div>
			</div>
			<h3>基本信息</h3>
			<ul>
				<li>
					<label>手机：</label>
					17681877730
				</li>
				<li>
					<label>Github：</label>
					<a href="https://github.com/CodeLittlePrince">github.com/CodeLittlePrince</a>
				</li>
				<li>
					<label>邮箱：</label>
					<a href="mailto:1006312908@qq.com" target="_blank">1006312908@qq.com</a>
				</li>
				<li>
					<label>博客：</label>
					<a href="http://luoziwo.cn">luoziwo.cn</a>
				</li>
				<li>
					<label>王者荣耀：</label>
					<a href="return:;">骡子不会灰</a> <small>(钻石 (｡ゝω･)bﾞ)</small>
				</li>
			</ul>
			<h3>语言</h3>
			<ul>
				<li>
					CET-6
				</li>
				<li>
					日语初级
				</li>
			</ul>
			<h3>教育以及工作经历</h3>
			<ul>
				<li>
					<label >2012 - 2016：【本科：三亚学院/网络工程】</label>
					<ul>
						<li>大学期间担任电子研究社社长</li>
						<li>理工学院辩论赛团队赛第一名</li>
					</ul>
				</li>
				<br>
				<li>
					<label>2015.7.1 - 2015.8.31：【实习：微软创新中心（海南）】</label>
					<ul>
						<li>技术部实习生一枚。在公司学习，与其他实习生一起完成小项目：搜集资料，功能分析，原型设计</li>
						<li>组织参与公司和海南政府合作召开的技术沙龙、技术论坛</li>
					</ul>
				</li>
				<br>
				<li>
					<label>2015.10.1 - 2015.12.31：【实习：微软创新中心（海南）】</label>
					<ul>
						<li>其他实习生一起用Scrum的协作模式开发公司的高尔丁项目（孵化小创业团队项目），内容有:市场调研，需求分析，竞品分析，商业模式，展望，运营推广方案，原型设计，后期开发...</li>
						<li>组织参与公司和海南政府、与其他互联网公司合作召开的技术沙龙、技术论坛</li>
					</ul>
				</li>
				<br>
				<li>
					<label>2016.3 - 至今：【实习+工作：半次元<a href="https://bcy.net" target="_blank"> bcy.net </a>】</label>
					<ul>
						<li>参与网站wap页面的重构，包括：样式、交互、Rem化</li>
						<li>负责网站wap页面的弹窗、走马灯组件的实现</li>
						<li>负责网站web页面的重构，包括：样式、布局、交互。涉及网站的所有页面</li>
						<li>
							负责网站的<a href="https://bcy.net/zhipin" target="_blank"> 制品商店 </a>的上线，功能：
							<ul>
								<li>
									用户线上<a href="https://bcy.net/zhipin/intro#designGoods" target="_blank"> 制作商品 </a>：制作商品用到了自己编写的组件，组件功能有，移动用户上传图片位置，放大缩小图片，前端合成商品的预览图（利用canvas），并将图片缩放比，移动位置等数据发送给后端，以便后端发给制品工厂数据
								</li>
								<li>
									购物车、商品的购买、订单管理（就相当于多个电商的功能）
								</li>
							</ul>
						</li>
						<li>
							负责网站的日常长文章发布的上线，配合七牛云，利用Tower公司的Simditor开源编辑器，对其进行改造，已适应七牛云和产品和后端的需求
						</li>
						<li>
							负责网站的视频作品发布的上线，原本使用HLS（HTTP Live Stream）的技术视频的播放功能，完成后，CTO为了视频防盗链的问题，采用了HTTP 206 Partial Content的方式来播放视频
						</li>
						<li>
							负责评论楼中楼的上线，在首页、个人主页、圈子页、标签页的瀑布流，COS，绘画，写作，日常，讨论的Detail页面加上评论套评论的功能（首页瀑布流得登录后才有；Detail请点这个COS的<a href="https://bcy.net/coser/detail/18760/614758" target="_blank"> Detail页面 </a>）
						</li>
						<li>
							一些活动页的制作：
							<ul>
								<li><a href="https://bcy.net/scholarship/drawer2017" target="_blank">绘师奖学金</a></li>
								<li><a href="https://bcy.net/static/jw3cos2017intro" target="_blank">剑网三</a></li>	
								<li><a href="https://bcy.net/static/yyscos2017intro" target="_blank">阴阳师</a></li>
								<li><a href="https://bcy.net/moe2016/result" target="_blank">半次元萌战</a></li>
								<li>半次元COS大赛</li>
								<li>等...</li>
							</ul>
						</li>
						<li>
							负责网站的性能优化、架构等
						</li>
					</ul>
				</li>
			</ul>
			<h3>技能掌握情况</h3>
			<ul>
				<li><label>基本技能</label></li>
				<ul>
					<li>Html</li>
					<li>Css</li>
					<li>Scss</li>
					<li>Javascript</li>
					<li>Jquery</li>
					<li>Juicer（类Ejs的前端模板）</li>
					<li>Ejs</li>
					<li>Seajs</li>
					<li>Commonjs</li>
				</ul>
				<li><label>版本管理</label></li>
				<ul>
					<li>
						Git命令行
					</li>
				</ul>
				<li><label>延伸技能</label></li>
				<ul>
					<li>Node</li>
					<li>Gulp</li>
					<li>Webpack</li>
					<li>Browserify</li>
					<li>React</li>
					<li>Laravel 5.4</li>
					<li>C、C++、Php、Java、C#</li>
				</ul>
				<li><label>品味习惯</label></li>
				<ul>
					<li>操作系统：Mac</li>
					<li>编辑器：Sublime/Atom</li>
					<li>学习总结：Microsoft OneNote</li>
				</ul>
			</ul>
		</div>
		
	</div>
@endsection