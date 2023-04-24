
import WAR_Upstream from './components/WAR_Upstream.vue';
import WAR_Gas from './components/WAR_Gas.vue';
import WAR_Downstream from './components/WAR_Downstream.vue';
import WAR_Engineering_standand from './components/WAR_Engineering_standand.vue';
import WAR_Shec from './components/WAR_Shec.vue';
import WAR_Corporate_services from './components/WAR_Corporate_services.vue';
import WAR_FAD_Tax_matters from './components/WAR_FAD_Tax_matters.vue';
import WAR_PAU from './components/WAR_PAU.vue';
import Monthly_Reporting_UPSTREAM from './components/Monthly_Reporting_UPSTREAM.vue';
import Monthly_Reporting_DOWNSTREAM from './components/Monthly_Reporting_DOWNSTREAM.vue';
import Monthly_Reporting_GAS from './components/Monthly_Reporting_GAS.vue';
import Monthly_Reporting_Engineering_and_Standand from './components/Monthly_Reporting_Engineering_and_Standand.vue';
import Monthly_Reporting_Health_Safety_Environment from './components/Monthly_Reporting_Health_Safety_Environment.vue';
import Monthly_Reporting_CORPORATE_SERVICES from './components/Monthly_Reporting_CORPORATE_SERVICES.vue';
import Monthly_Reporting_FAD_TAX from './components/Monthly_Reporting_FAD_TAX.vue';
import Monthly_Reporting_PUBLIC_AFFAIR from './components/Monthly_Reporting_PUBLIC_AFFAIR.vue';

export default
	[

		{ path: '/war-upstream', component: WAR_Upstream },

		{ path: '/war-gas', component: WAR_Gas },

		{ path: '/war-downstream', component: WAR_Downstream },

		{ path: '/war-engineering-standand', component: WAR_Engineering_standand },

		{ path: '/war-shec', component: WAR_Shec },

		{ path: '/war-corporate-services', component: WAR_Corporate_services },

		{ path: '/war-fad-tax-matters', component: WAR_FAD_Tax_matters },

		{ path: '/war-public-affairs', component: WAR_PAU },

		{ path: '/monthly-reporting-UPSTREAM', component: Monthly_Reporting_UPSTREAM },

		{ path: '/monthly-reporting-DOWNSTREAM', component: Monthly_Reporting_DOWNSTREAM },

		{ path: '/monthly-reporting-GAS', component: Monthly_Reporting_GAS },

		{ path: '/monthly-reporting-Engineering-and-Standand', component: Monthly_Reporting_Engineering_and_Standand },

		{ path: '/monthly-reporting-health-safety-environment', component: Monthly_Reporting_Health_Safety_Environment },

		{ path: '/monthly-reporting-corporate-services', component: Monthly_Reporting_CORPORATE_SERVICES },

		{ path: '/monthly-reporting-FAD-Tax-matters', component: Monthly_Reporting_FAD_TAX },

		{ path: '/monthly-reporting-public-affairs', component: Monthly_Reporting_PUBLIC_AFFAIR }
	]