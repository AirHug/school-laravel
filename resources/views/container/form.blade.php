<div class="pageContent">
    <form method="post" @yield('type')>
        <div class="pageFormContent" layoutH="56">
            {{ csrf_field() }}
            @yield('body')
        </div>
        @yield('script')
        <div class="formBar">
            <ul>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
                <li>
                    <div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
                </li>
            </ul>
        </div>
    </form>
</div>