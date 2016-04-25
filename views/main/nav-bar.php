        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav col-md-12">
                <li class="col-md-x5 <? if($section=='catalogo') echo active ?>"><a href="<? echo PATH ?>catalogo">Catálogo</a></li>
                <li class="col-md-x5 <? if($section=='nosotros') echo active ?>"><a href="<? echo PATH ?>pages/nosotros">Nosotros</a></li>
                <li class="col-md-x5 two-lanes <? if($section=='plan-de-ahorro') echo active ?>"><a href="<? echo PATH ?>pages/plan-de-ahorro">Qué es un plan de ahorro</a></li>
                <li class="col-md-x5 <? if($section=='clasificados') echo active ?>"><a href="<? echo PATH ?>pages/clasificados">Clasificados</a></li>
                <li class="col-md-x5 <? if($section=='contactanos') echo active ?>"><a href="<? echo PATH ?>pages/contactanos">Contactanos</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>