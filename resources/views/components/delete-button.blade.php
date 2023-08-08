 @if ($user->role != 'editor')
     <button class="btn btn-danger" onclick="return confirm('Are You Sure?')" formaction="{{ $route }}"
         type="submit">
         <i class="fa fa-trash"></i>
     </button>
 @endif
