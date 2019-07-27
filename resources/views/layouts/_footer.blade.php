<footer class="footer" id="">
            <div class="container">
                <span class="text-muted">{{ config('app.name', 'Laravel') }}</span>
            </div>
</footer>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    
  </body>
</html>