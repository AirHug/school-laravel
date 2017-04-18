<form id="pagerForm" method="post" action="@yield('link')">
    <input type="hidden" name="pageNum" value="1"/>
    <input type="hidden" name="numPerPage" value="@yield('numPerPage')"/>
    {{ csrf_field() }}
    @yield('hiddenSearch')
</form>

<div class="pageHeader">
    <form rel="pagerForm" method="post" action="@yield('link')" onsubmit="return dwzSearch(this, 'dialog');">
        <div class="searchBar">
            <table class="searchContent">
                <tr>
                    {{ csrf_field() }}
                    @yield('search')
                </tr>
            </table>
            <div class="subBar">
                <ul>
                    <li>
                        <div class="buttonActive">
                            <div class="buttonContent">
                                <button type="submit">查询</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>
<div class="pageContent">
    <table class="table" layoutH="118" targetType="dialog" width="100%">
        @yield('table')
    </table>
    <div class="panelBar">
        <div class="pages">
            <span>每页</span>
            <select name="numPerPage" onchange="dwzPageBreak({targetType:'dialog', numPerPage:'10'})">
                <option value="10" selected="selected">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span>条，共@yield('totalCount')条</span>
        </div>
        <div class="pagination" targetType="dialog" totalCount="@yield('totalCount')" numPerPage="@yield('numPerPage')" pageNumShown="5" currentPage="@yield('currentPage')"></div>
    </div>
</div>