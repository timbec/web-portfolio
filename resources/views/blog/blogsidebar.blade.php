<aside class="blog-sidebar">
    <h3>Blog Sidebar</h3>
    <ul class="tag-cloud">
        @foreach($tags as $tag) 
        <li>
            <a href="/tags/{{ $tag->name }}">
            {{ $tag->name }}
            </a>
        </li>
    @endforeach
    </ul>
</aside>