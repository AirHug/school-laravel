<form id="pagerForm" method="post" action="@yield('link')">
    <input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="@yield('numPerPage')" />
    {{ csrf_field() }}
    @yield('hiddenSearch')
</form>
<div class="pageHeader">
    <form onsubmit="return navTabSearch(this);" action="@yield('link')" method="post">
        <div class="searchBar">
            {{ csrf_field() }}
            <table class="searchContent">
                @yield('search')
            </table>
            <div class="subBar">
                <ul>
                    <li>
                        <div class="buttonActive">
                            <div class="buttonContent">
                                <button type="submit">检索</button></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>
<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            @yield('buttons')
        </ul>
    </div>
    <table class="table" width="100%" layouth="138">
            @yield('table')
    </table>
    <div class="panelBar">
        <div class="pages">
            <span>显示</span>
            <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
            <span>条，共@yield('totalCount')条</span>
        </div>
        <div class="pagination" targettype="navTab" totalcount="@yield('totalCount')" numperpage="@yield('numPerPage')" pagenumshown="10" currentpage="@yield('currentPage')">
        </div>
    </div>
</div>