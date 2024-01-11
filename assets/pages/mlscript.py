import pandas as pd
from sklearn.cluster import KMeans
from sklearn.ensemble import RandomForestRegressor
from sklearn.preprocessing import LabelEncoder
import plotly.graph_objects as go
from sqlalchemy import create_engine

db_config = {
    'host': '127.0.0.1',
    'user': 'root',
    'password': '',
    'database': 'entrepreneur'
}

try:
    engine = create_engine(f"mysql+mysqlconnector://{db_config['user']}:{db_config['password']}@{db_config['host']}/{db_config['database']}")
    conn = engine.connect()

    query = "SELECT StartupName, StartupDomain, Revenue2020, Revenue2021, Revenue2022, Revenue2023, Expenses2023, Profit FROM entry"
    df = pd.read_sql_query(query, conn)

    df = df.drop_duplicates()

    df['StartupName'] = df['StartupName'].str.replace('\r\n', '').str.strip()
    df['StartupDomain'] = df['StartupDomain'].str.replace('\r\n', '').str.strip()

    label_encoder = LabelEncoder()
    df['StartupDomainEncoded'] = label_encoder.fit_transform(df['StartupDomain'])

    kmeans = KMeans(n_clusters=5, n_init=10, random_state=42)
    df['Cluster'] = kmeans.fit_predict(df[['StartupDomainEncoded']])

    ranked_results = pd.DataFrame(columns=['Cluster', 'ClusterRank', 'StartupName', 'StartupDomain',
                                           'Revenue2020', 'Revenue2021', 'Revenue2022', 'Revenue2023',
                                           'Expenses2023', 'Profit', 'ProjectedRevenue'])

    features = ['Revenue2020', 'Revenue2021', 'Revenue2022', 'Expenses2023', 'Profit']

    for cluster in df['Cluster'].unique():
        cluster_data = df[df['Cluster'] == cluster].copy()

        if not cluster_data.empty:
            cluster_data['StartupDomain'] = label_encoder.inverse_transform(cluster_data['StartupDomainEncoded'])
            cluster_data['ClusterRank'] = cluster_data['Revenue2023'].rank(ascending=False)

            X = cluster_data[features]
            y = cluster_data['Revenue2023']

            rf_regressor = RandomForestRegressor(n_estimators=100, random_state=42)
            rf_regressor.fit(X, y)

            cluster_data['ProjectedRevenue'] = rf_regressor.predict(X)

            cluster_data.sort_values('StartupDomain', inplace=True)

            if not cluster_data[features].isna().all().all() and not ranked_results.empty:
                ranked_results = pd.concat([ranked_results, cluster_data])
            elif not cluster_data[features].isna().all().all():
                ranked_results = cluster_data.copy()

    ranked_results.sort_values(['Cluster', 'ClusterRank'], inplace=True)

    fig = go.Figure(data=[go.Table(
        header=dict(values=['Cluster', 'ClusterRank', 'StartupName', 'StartupDomain',
                             'Revenue2020', 'Revenue2021', 'Revenue2022', 'Revenue2023',
                             'Expenses2023', 'Profit', 'ProjectedRevenue']),
        cells=dict(values=[ranked_results['Cluster'], ranked_results['ClusterRank'], ranked_results['StartupName'],
                           ranked_results['StartupDomain'], ranked_results['Revenue2020'],
                           ranked_results['Revenue2021'], ranked_results['Revenue2022'],
                           ranked_results['Revenue2023'], ranked_results['Expenses2023'],
                           ranked_results['Profit'], ranked_results['ProjectedRevenue']]))
    ])

    fig.update_layout(title_text="<b>Investment Recommendations by ML</b>")

    fig.write_html('table.php', auto_open=True)

except Exception as e:
    print(f"Error: {e}")

finally:
    if 'conn' in locals():
        conn.close()