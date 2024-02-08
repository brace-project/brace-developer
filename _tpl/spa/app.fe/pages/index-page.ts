import {customElement, KaCustomElement, template} from "@kasimirjs/embed";
import {route, router} from "@kasimirjs/app";
import {CurRoute} from "@kasimirjs/app";
import {ThreadListWithFilters} from "../components/ThreadListWithFilters";


// language=html
let html = `
<div class="container-fluid" style="">
    <div class="row">
        <div class="col-12" style="height: 100vh">
            <h2>Hello World: [[ user ]]</h2>
        </div>
    </div>
</div>
`



@customElement("index-page")
@route("gallery", "/static/{username}")
@template(html)
class IndexPage extends KaCustomElement {

    constructor(public route : CurRoute) {
        super();
        let scope = this.init({
            name: router.currentRoute.route_params["username"]
        })
    }

    async connectedCallback(): Promise<void> {
        super.connectedCallback();
        this.scope.threadList = new ThreadListWithFilters(router.currentRoute.route_params["subscription_id"])
    }
}
