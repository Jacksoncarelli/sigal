<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" align="center" style="overflow:hidden">
    <div class="modal-dialog  col-sm-push-0" >
        <div class="modal-content " align="center" >
            <div class="modal-content " >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>

                <div class="modal-body col-sm-pull-0">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>

                    {!! Form::open(array('route' => 'agendamentos.store', 'class' => 'form-horizontal')) !!}
                        @include('agendamentos._form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>