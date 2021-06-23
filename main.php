    public function getUsers()
    {
        $users = Model::query()
            ->where('create_at', '>', Carbon::now()->subDays(7))
            ->select('item_id', DB::raw('COUNT(*) as users_count'))
            ->groupBy('item_id')
            ->having('users_count', '>=', 2)->get();
        return view('home', ['users' => $users]);
    }
