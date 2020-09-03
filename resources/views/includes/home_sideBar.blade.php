 <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="/search" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                    </form>

                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                                @if($categories)

                                    @foreach($categories as $category)
                                    <li> <a href="{{ route('category.post', $category->id ) }}">{{ $category->name }}</a> </li>
                                    @endforeach

                                @endif
                        </div>
                      
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>This is just a random dummy dynamic CMS snippet whose contents are created using factories like our previous works. It is designed with Laravel 7.25 and with some cool packages you may want to use on your project. Contact atutechsdev@gmail.com </p>
                </div>

            </div>
