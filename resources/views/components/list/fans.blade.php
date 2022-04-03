@props([
    'followers',
    'followings',
])

<section>
    <article>
        <h2>
            Followers
        </h2>

        <x-list.profiles
            :profiles="$followers"
            message="This user does not have any followers."
        />
    </article>
    
    <article>
        <h2>
            Following
        </h2>

        <x-list.profiles 
            :profiles="$followings"
            message="This user does not follow any other users."
        />
    </article>
</section>
