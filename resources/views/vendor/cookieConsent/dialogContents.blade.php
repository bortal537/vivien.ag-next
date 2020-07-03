<div
    class="js-cookie-consent cookie-consent"
    style="margin-bottom:-1px"
>

    <div class="relative bg-{{ accent() }}-500 text-white z-10">

        <div class="lg:max-w-5xl md:pl-5 mx-auto px-5 py-3 xl:max-w-screen-xl xl:px-10">

            <div class="flex flex-col md:items-center md:flex-row leading-tight">

                <div class="md:mr-5">

                    <span class="cookie-consent__message font-medium md:block text-sm md:text-base">
                        {{ trans('cookieConsent::texts.message') }}
                    </span>

                    <span class="text-xs">
                        {{ trans('cookieConsent::texts.info') }}
                        <a href="{{ routeIfExists('cookie-policy') }}" class="font-medium hover:underline">{{ lcfirst(trans('cookieConsent::texts.click_here')) }}</a>.
                    </span>

                </div>

                <button
                    class="js-cookie-consent-button bg-white focus:bg-opacity-100 font-light h-8 hover:bg-{{ accent() }}-600 hover:text-white px-2 md:mt-0 md:mr-1 mt-2 rounded text-{{ accent() }}-600 text-sm whitespace-no-wrap"
                    data-callback-params="{all:true}"
                >
                    {{ trans('cookieConsent::texts.agree') }}
                </button>

                <a
                    class="font-light h-8 hover:underline px-2 md:h-auto md:mt-0 md:mr-1 mt-2 rounded text-xs whitespace-no-wrap"
                    href="{{ routeIfExists('cookie-policy') }}"
                >
                    {{ trans('cookieConsent::texts.settings') }}
                </a>

            </div>

        </div>

    </div>

</div>
