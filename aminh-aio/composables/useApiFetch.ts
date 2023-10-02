import type { UseFetchOptions } from "nuxt/app";
import { useCookie, useFetch, useRequestHeaders } from "nuxt/app";

export function useApiFetch<T>(path: string, options: UseFetchOptions<T> = {}) {
    let headers: any = {}
    
    const token = useCookie('XSRF-TOKEN');
    // const token = typeof window !== 'undefined' ? localStorage.getItem('authToken') : null;

    if (token.value) {
        headers['Authorization'] = `Bearer ${token.value as string}`;
    }

    if (process.server) {
        headers = {
            ...headers,
            ...useRequestHeaders(["cookie"]),
            referer: "http://127.0.0.1:3000",
        }
    }

    // console.log(options.headers);
     
    
    return useFetch("http://127.0.0.1:8000" + path, {
        credentials: "include",
        watch: false,
        ...options,
        headers: {
            ...headers,
            ...options?.headers
        }
    });
}